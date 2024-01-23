<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Content\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content\PostCategory;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Content\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.content.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PostCategory $postCategory)
    {
        $categorys = $postCategory->all();
        return view('admin.content.post.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, Post $post, ImageService $imageservice)
    {

        $inputs = $request->all();

        // date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);


        // image Upload
        if ($request->hasFile('image')) {
            $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageservice->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return to_route('admin.content.post.create')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }


        // store data in database
        $inputs['author_id'] = 1;
        $post->create($inputs);
        return to_route('admin.content.post.index')
            ->with('alert-section-success', 'پست جدید شما با موفقیت ثبت شد');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadImagesCkeditor(Request $request, ImageService $imageService)
    {
        $request->validate([
            'upload' => 'sometimes|required|max:10240|image|mimes:png,jpg,jpeg,gif,ico,svg,webp'
        ]);
        // image Upload
        if ($request->hasFile('upload')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post-body');
            $url = $imageService->save($request->file('upload'));
            $url = str_replace('\\', '/', $url);
            $url = asset($url);

            return "<script>window.parent.CKEDITOR.tools.callFunction(1, '{$url}' , '')</script>";
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, PostCategory $postCategory)
    {
        $categorys = $postCategory->all();
        $timestampStart = strtotime($post['published_at']);
        $post['published_at'] = $timestampStart . '000';
        return view('admin.content.post.edit', compact('post', 'categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post, ImageService $imageservice)
    {

        $inputs = $request->all();
        // date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        // update image set and edit
        if ($request->hasFile('image')) {
            if (!empty($post)) {
                $imageservice->deleteDirectoryAndFiles($post->image['directory']);
            }
            $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageservice->createIndexAndSave($request->file('image'));

            if ($result === false) {
                return to_route('admin.content.post.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($post->image)) {
                $image = $post->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }


        // dd($post);

        $post->update($inputs);
        return to_route('admin.content.post.index')
            ->with('alert-section-success', 'ویرایش پست با عنوان   ' . $post['title'] . ' با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $result = $post->delete();
        return to_route('admin.content.post.index')
            ->with('alert-section-success', ' دسته بندی با عنوان ' . $post->title . ' با موفقیت حذف شد');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Post $post)
    {
        $post->status = $post->status == 0 ? 1 : 0;
        $result = $post->save();

        if ($result) {
            if ($post->status == 0) {
                return response()->json(['status' => true, 'checked' => false, 'id' => $post->title]);
            } else {
                return response()->json(['status' => true, 'checked' => true, 'id' => $post->title]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function commentable(Post $post)
    {
        $post->commentable = $post->commentable == 0 ? 1 : 0;
        $result = $post->save();

        if ($result) {
            if ($post->commentable == 0) {
                return response()->json(['commentable' => true, 'checked' => false, 'id' => $post->id]);
            } else {
                return response()->json(['commentable' => true, 'checked' => true, 'id' => $post->id]);
            }
        } else {
            return response()->json(['commentable' => false]);
        }
    }
}
