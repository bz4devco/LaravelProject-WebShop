<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CategoryAttributeRequest;
use App\Models\Market\ProductCategory;
use App\Models\Market\CategoryAttribute;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_attributes = CategoryAttribute::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.market.property.index', compact('category_attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategoreis = ProductCategory::whereNotNull('parent_id')->get(['id', 'name']);
        return view('admin.market.property.create', compact('productCategoreis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryAttributeRequest $request)
    {
        $inputs = $request->all();
        $category_attribute = CategoryAttribute::create($inputs);
        return redirect()->route('admin.market.property.index')
        ->with('alert-section-success', 'فرم کالای جدید شما با موفقیت ثبت شد');
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
    public function edit(CategoryAttribute $categoryAttribute)
    {
        $productCategoreis = ProductCategory::whereNotNull('parent_id')->get(['id', 'name']);
        return view('admin.market.property.edit', compact('categoryAttribute', 'productCategoreis'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryAttributeRequest $request, CategoryAttribute $categoryAttribute)
    {

        $inputs = $request->all();


        
    
        $result  = $categoryAttribute->update($inputs);

        return redirect()->route('admin.market.property.index')
        ->with('alert-section-success', ' ویرایش فرم کالا شماره '.$categoryAttribute->id.' با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryAttribute $categoryAttribute)
    {
        $result = $categoryAttribute->delete();
        return redirect()->route('admin.market.property.index')
        ->with('alert-section-success', ' فرم کالا شماره'.$categoryAttribute->id.' با موفقیت حذف شد');
    }
}
