<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Market\ProductCategory;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Market\ProductCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategorys = ProductCategory::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.market.category.index', compact('productCategorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_names = ProductCategory::all(['id','name']);
        return view('admin.market.category.create', compact('parent_names'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request, ProductCategory $productCategory, ImageService $imageservice)
    {
        $inputs = $request->all();

        // image Upload
        if($request->hasFile('image'))
        {
            $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
            $result = $imageservice->createIndexAndSave($request->file('image'));
            if($result === false)
            {
                return redirect()->route('admin.market.category.create')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
     

        // store data in database
        $productCategory->create($inputs);
        return redirect()->route('admin.market.category.index')
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
    public function edit(ProductCategory $productCategory)
    {
        $parent_names = ProductCategory::all(['id','name']);
        return view('admin.market.category.edit', compact('productCategory', 'parent_names'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory, ImageService $imageservice)
    {

        $inputs = $request->all();
        
        
        // update image set and edit
        if($request->hasFile('image'))
        {
            if(!empty($productCategory))
            {
                $imageservice->deleteDirectoryAndFiles($productCategory->image['directory']);
            }
            $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
            $result = $imageservice->createIndexAndSave($request->file('image'));
            
            if($result === false)
            {
                return redirect()->route('admin.market.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        else {
            if(isset($inputs['currentImage']) && !empty($productCategory->image))
            {
                $image = $productCategory->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }



        $productCategory->update($inputs);
        return redirect()->route('admin.market.category.index')
        ->with('alert-section-success', 'ویرایش دسته بندی شماره   '.$productCategory['id'].' با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        $result = $productCategory->delete();
        return redirect()->route('admin.market.category.index')
        ->with('alert-section-success', ' دسته بندی شماره '.$productCategory->id.' با موفقیت حذف شد');
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(productCategory $productCategory)
    {
        $productCategory->status = $productCategory->status == 0 ? 1 : 0;
        $result = $productCategory->save();

        if($result){
            if($productCategory->status == 0){
                return response()->json(['status' => true, 'checked' => false, 'id' => $productCategory->id]);
            }else{
                return response()->json(['status' => true, 'checked' => true, 'id' => $productCategory->id]);
            }
        }else{
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
    public function showInMenu(productCategory $productCategory)
    {
        $productCategory->show_in_menu = $productCategory->show_in_menu == 0 ? 1 : 0;
        $result = $productCategory->save();

        if($result){
            if($productCategory->show_in_menu == 0){
                return response()->json(['showInMenu' => true, 'checked' => false, 'id' => $productCategory->id]);
            }else{
                return response()->json(['showInMenu' => true, 'checked' => true, 'id' => $productCategory->id]);
            }
        }else{
            return response()->json(['showInMenu' => false]);
        }
    }
}
