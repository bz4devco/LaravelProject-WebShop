<?php

namespace App\Http\Controllers\Admin\Market\Discount;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Market\CommonDiscount;
use App\Http\Requests\Admin\Market\CommonDiscountRequest;

class CommonDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commonDiscounts = CommonDiscount::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.market.discount.common-discount.index', compact('commonDiscounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.market.discount.common-discount.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommonDiscountRequest $request, CommonDiscount $commonDiscount)
    {

        $inputs = $request->all();

        // start date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        
        // end date fixed
        $realTimestampend = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$realTimestampend);

        // store data in database
        $commonDiscount->create($inputs);
        return to_route('admin.market.discount.common-discount.index')
        ->with('alert-section-success', 'تخفیف عمومی جدید شما با موفقیت ثبت شد');
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
    public function edit(CommonDiscount $commonDiscount)
    {
        // convert date to timestamp
        $timestampStart = strtotime($commonDiscount['start_date']);
        $commonDiscount['start_date'] = $timestampStart . '000';
        
        $timestampEnd = strtotime($commonDiscount['end_date']);
        $commonDiscount['end_date'] = $timestampEnd . '000';

        return view('admin.market.discount.common-discount.edit', compact('commonDiscount'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommonDiscountRequest $request, CommonDiscount $commonDiscount)
    {
     
        $inputs = $request->all();

        // start date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        
        // end date fixed
        $realTimestampStart = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        $commonDiscount->update($inputs);
        return to_route('admin.market.discount.common-discount.index')
        ->with('alert-section-success', 'ویرایش تخفیف عمومی با عنوان   '.$commonDiscount['title'].' با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommonDiscount $commonDiscount)
    {
        $result = $commonDiscount->delete();
        return to_route('admin.market.discount.common-discount.index')
        ->with('alert-section-success', ' تخفیف عمومی با عنوان '.$commonDiscount->title.' با موفقیت حذف شد');
    }

         /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(CommonDiscount $commonDiscount)
    {
        $commonDiscount->status = $commonDiscount->status == 0 ? 1 : 0;
        $result = $commonDiscount->save();

        if($result){
            if($commonDiscount->status == 0){
                return response()->json(['status' => true, 'checked' => false, 'id' => $commonDiscount->id]);
            }else{
                return response()->json(['status' => true, 'checked' => true, 'id' => $commonDiscount->id]);
            }
        }else{
            return response()->json(['status' => false]);
        }
    }
}
