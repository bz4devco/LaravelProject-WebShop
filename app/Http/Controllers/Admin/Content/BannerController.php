<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\Http\Request;
use App\Models\Content\Banner;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Content\BannerRequest;

class BannerController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('created_at', 'desc')->paginate(15);
        $positions = Banner::$positions;
        return view('admin.content.banner.index', compact('banners', 'positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Banner::$positions;
        return view('admin.content.banner.create', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request, Banner $banner, ImageService $imageservice)
    {
        $inputs = $request->all();

        // image Upload
        if($request->hasFile('image'))
        {
            $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'banner');
            $result = $imageservice->save($request->file('image'));
            if($result === false)
            {
                return to_route('admin.content.banner.create')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
     

        // store data in database
        $banner->create($inputs);
        return to_route('admin.content.banner.index')
        ->with('alert-section-success', 'بنر جدید شما با موفقیت ثبت شد');
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
    public function edit(Banner $banner)
    {
        $positions = Banner::$positions;
        return view('admin.content.banner.edit', compact('banner', 'positions'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner, ImageService $imageservice)
    {

        $inputs = $request->all();
        
        
        // update image set and edit
        if($request->hasFile('image'))
        {
            if(!empty($banner->image))
            {
                $imageservice->deleteImage($banner->image);
            }

            $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'banner');
            $result = $imageservice->save($request->file('image'));
            
            if($result === false)
            {
                return to_route('admin.content.banner.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        else {
            if(isset($inputs['currentImage']) && !empty($banner->image))
            {
                $image = $banner->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }



        $banner->update($inputs);
        return to_route('admin.content.banner.index')
        ->with('alert-section-success', 'ویرایش بنر با عنوان   '.$banner['title'].' با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $result = $banner->delete();
        return to_route('admin.content.banner.index')
        ->with('alert-section-success', ' بنر با عنوان '.$banner->title.' با موفقیت حذف شد');
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(banner $banner)
    {
        $banner->status = $banner->status == 0 ? 1 : 0;
        $result = $banner->save();

        if($result){
            if($banner->status == 0){
                return response()->json(['status' => true, 'checked' => false, 'id' => $banner->title]);
            }else{
                return response()->json(['status' => true, 'checked' => true, 'id' => $banner->title]);
            }
        }else{
            return response()->json(['status' => false]);
        }
    }}
