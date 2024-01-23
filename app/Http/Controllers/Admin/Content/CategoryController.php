<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content\PostCategory;
use App\Http\Requests\Admin\Content\PostCategoryRequest;
use App\Http\Services\Image\ImageService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $postCategorys = PostCategory::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.content.category.index', compact('postCategorys'));
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCategoryRequest $request, PostCategory $postCategory, ImageService $imageservice)
    {
        $inputs = $request->all();

        // image Upload
        if($request->hasFile('image'))
        {
            $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post-category');
            $result = $imageservice->createIndexAndSave($request->file('image'));
            if($result === false)
            {
                return to_route('admin.content.category.create')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
     

        // store data in database
        $postCategory->create($inputs);
        return to_route('admin.content.category.index')
        ->with('alert-section-success', 'دسته بندی جدید شما با موفقیت ثبت شد');
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
    public function edit(PostCategory $postCategory)
    {
        return view('admin.content.category.edit', compact('postCategory'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCategoryRequest $request, PostCategory $postCategory, ImageService $imageservice)
    {

        $inputs = $request->all();
        
        
        // update image set and edit
        if($request->hasFile('image'))
        {
            if(!empty($postCategory))
            {
                $imageservice->deleteDirectoryAndFiles($postCategory->image['directory']);
            }
            $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post-category');
            $result = $imageservice->createIndexAndSave($request->file('image'));
            
            if($result === false)
            {
                return to_route('admin.content.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        else {
            if(isset($inputs['currentImage']) && !empty($postCategory->image))
            {
                $image = $postCategory->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }



        $postCategory->update($inputs);
        return to_route('admin.content.category.index')
        ->with('alert-section-success', 'ویرایش دسته بندی با نام   '.$postCategory['name'].' با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $postCategory)
    {
        $result = $postCategory->delete();
        return to_route('admin.content.category.index')
        ->with('alert-section-success', ' دسته بندی با نام '.$postCategory->name.' با موفقیت حذف شد');
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(PostCategory $postCategory)
    {
        $postCategory->status = $postCategory->status == 0 ? 1 : 0;
        $result = $postCategory->save();

        if($result){
            if($postCategory->status == 0){
                return response()->json(['status' => true, 'checked' => false, 'id' => $postCategory->name]);
            }else{
                return response()->json(['status' => true, 'checked' => true, 'id' => $postCategory->name]);
            }
        }else{
            return response()->json(['status' => false]);
        }
    }
}
