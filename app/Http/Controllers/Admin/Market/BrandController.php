<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\Market\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Market\BrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.market.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.market.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request, Brand $brand, ImageService $imageservice)
    {
        $inputs = $request->all();

        // create image of logo
        if ($request->hasFile('logo')) {
            $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'brand');
            $imageservice->setImageName('logo');
            $result = $imageservice->save($request->file('logo'));

            if ($result === false) {
                return to_route('admin.brand.edit')->with('swal-error', 'آپلود آیکون با خطا مواجه شد');
            }
            $inputs['logo'] = $result;
        }


        $brand->create($inputs);
        return to_route('admin.market.brand.index')
        ->with('alert-section-success', 'برند جدید شما با موفقیت ثبت شد');
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
    public function edit(Brand $brand)
    {
        return view('admin.market.brand.edit', compact('brand'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand, ImageService $imageservice)
    {
        $inputs = $request->all();

          // update image of logo
          if ($request->hasFile('logo')) {
            if (!empty($brand->logo)) {
                $imageservice->deleteImage($brand->logo);
            }
            $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'brand');
            $imageservice->setImageName('logo');
            $result = $imageservice->save($request->file('logo'));

            if ($result === false) {
                return to_route('admin.brand.edit')->with('swal-error', 'آپلود آیکون با خطا مواجه شد');
            }
            $inputs['logo'] = $result;
        }

        $brand->update($inputs);
        return to_route('admin.market.brand.index')
        ->with('alert-section-success', 'ویرایش برند با نام   '.$brand->persian_name .' با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $result = $brand->delete();
        return to_route('admin.market.brand.index')
        ->with('alert-section-success', ' برند با نام '.$brand->persian_name.' با موفقیت حذف شد');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Brand $brand)
    {
        $brand->status = $brand->status == 0 ? 1 : 0;
        $result = $brand->save();

        if($result){
            if($brand->status == 0){
                return response()->json(['status' => true, 'checked' => false, 'id' => $brand->persian_name]);
            }else{
                return response()->json(['status' => true, 'checked' => true, 'id' => $brand->persian_name]);
            }
        }else{
            return response()->json(['status' => false]);
        }
    }
}
