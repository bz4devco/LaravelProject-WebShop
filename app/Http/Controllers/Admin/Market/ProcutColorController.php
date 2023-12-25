<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductColorRequest;
use App\Models\Market\Product;
use App\Models\Market\ProductColor;
use Illuminate\Http\Request;

class ProcutColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return view('admin.market.product.color.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.market.product.color.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductColorRequest $request, Product $product)
    {
        $inputs = $request->all();
        $inputs['product_id'] = $product->id;


        // store data in database
        $color = ProductColor::create($inputs);
        return redirect()->route('admin.market.product.color.index', $product->id)
        ->with('alert-section-success', 'رنگ جدید شما با موفقیت ثبت شد');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductColor $productColor)
    {
        $result = $productColor->delete();
        return redirect()->route('admin.market.product.color.index', $product->id)
        ->with('alert-section-success', ' رنگ '.$productColor->name.' این محصول با موفقیت حذف شد');
    }


    
         /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(ProductColor $productColor)
    {
        $productColor->status = $productColor->status == 0 ? 1 : 0;
        $result = $productColor->save();

        if($result){
            if($productColor->status == 0){
                return response()->json(['status' => true, 'checked' => false, 'id' => $productColor->id]);
            }else{
                return response()->json(['status' => true, 'checked' => true, 'id' => $productColor->id]);
            }
        }else{
            return response()->json(['status' => false]);
        }
    }
}
