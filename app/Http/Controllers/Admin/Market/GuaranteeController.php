<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Market\Guarantee;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\GuaranteeRequest;

class GuaranteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return view('admin.market.product.guarantee.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.market.product.guarantee.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuaranteeRequest $request, Product $product)
    {
        $inputs = $request->all();
        $inputs['product_id'] = $product->id;


        // store data in database
        $guarantees = Guarantee::create($inputs);
        return to_route('admin.market.product.guarantee.index', $product->id)
        ->with('alert-section-success', 'رنگ جدید شما با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Guarantee $guarantee)
    {
        $result = $guarantee->delete();
        return to_route('admin.market.product.guarantee.index', $product->id)
        ->with('alert-section-success', ' رنگ '.$guarantee->name.' این محصول با موفقیت حذف شد');
    }


    
         /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Guarantee $guarantee)
    {
        $guarantee->status = $guarantee->status == 0 ? 1 : 0;
        $result = $guarantee->save();

        if($result){
            if($guarantee->status == 0){
                return response()->json(['status' => true, 'checked' => false, 'id' => $guarantee->id]);
            }else{
                return response()->json(['status' => true, 'checked' => true, 'id' => $guarantee->id]);
            }
        }else{
            return response()->json(['status' => false]);
        }
    }
}
