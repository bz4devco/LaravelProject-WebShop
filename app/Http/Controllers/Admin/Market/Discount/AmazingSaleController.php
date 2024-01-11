<?php

namespace App\Http\Controllers\Admin\Market\Discount;

use Illuminate\Http\Request;
use App\Models\Market\AmazingSale;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\AmazingSaleRequest;
use App\Models\Market\Product;

class AmazingSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amazingSales = AmazingSale::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.market.discount.amazing-sale.index', compact('amazingSales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productsName = Product::all();
        return view('admin.market.discount.amazing-sale.create', compact('productsName'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmazingSaleRequest $request, AmazingSale $amazingSale)
    {
        $inputs = $request->all();

        // start date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        
        // end date fixed
        $realTimestampend = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$realTimestampend);

        // store data in database
        $amazingSale->create($inputs);
        return to_route('admin.market.discount.amazing-sale.index')
        ->with('alert-section-success', 'فروش شگفت انگیز جدید شما با موفقیت ثبت شد');    
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
     public function edit(AmazingSale $amazingSale)
    {

        $productsName = Product::all();

        // convert date to timestamp
        $timestampStart = strtotime($amazingSale['start_date']);
        $amazingSale['start_date'] = $timestampStart . '000';
        
        $timestampEnd = strtotime($amazingSale['end_date']);
        $amazingSale['end_date'] = $timestampEnd . '000';

        return view('admin.market.discount.amazing-sale.edit', compact('amazingSale', 'productsName'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AmazingSaleRequest $request, AmazingSale $amazingSale)
    {
   $inputs = $request->all();


        // start date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        
        // end date fixed
        $realTimestampStart = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        $amazingSale->update($inputs);
        return to_route('admin.market.discount.amazing-sale.index')
        ->with('alert-section-success', 'ویرایش فروش شگغت انگیز برای کالای   '.$amazingSale->product->name.' با موفقیت انجام شد');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy(AmazingSale $amazingSale)
    {
        $result = $amazingSale->delete();
        return to_route('admin.market.discount.amazing-sale.index')
        ->with('alert-section-success', ' فروش شگفت انگیز با عنوان '.$amazingSale->title.' با موفقیت حذف شد');
    }

         /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(AmazingSale $amazingSale)
    {
        $amazingSale->status = $amazingSale->status == 0 ? 1 : 0;
        $result = $amazingSale->save();

        if($result){
            if($amazingSale->status == 0){
                return response()->json(['status' => true, 'checked' => false, 'id' => $amazingSale->id]);
            }else{
                return response()->json(['status' => true, 'checked' => true, 'id' => $amazingSale->id]);
            }
        }else{
            return response()->json(['status' => false]);
        }
    }
}
