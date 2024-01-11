<?php

namespace App\Http\Controllers\Admin\Market\Discount;

use App\Models\User;
use App\Models\Market\Copan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CopanRequest;

class CopanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $copans = Copan::orderBy('created_at', 'desc')->simplePaginate(15);

        return view('admin.market.discount.copan.index', compact('copans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $costumers  = User::where('user_type', 0)
        ->orderBy('created_at', 'desc')->get();

        return view('admin.market.discount.copan.create', compact('costumers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CopanRequest $request, Copan $copan)
    {
        $inputs = $request->all();

        // start date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        
        // end date fixed
        $realTimestampend = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$realTimestampend);

        // store data in database
        $copan->create($inputs);
        return to_route('admin.market.discount.copan.index')
        ->with('alert-section-success', 'کوپن تخفیف جدید شما با موفقیت ثبت شد');
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
    public function edit(Copan $copan)
    {
   
        $costumers  = User::where('user_type', 0)
        ->orderBy('created_at', 'desc')->get();

        // convert date to timestamp
        $timestampStart = strtotime($copan['start_date']);
        $copan['start_date'] = $timestampStart . '000';
        
        $timestampEnd = strtotime($copan['end_date']);
        $copan['end_date'] = $timestampEnd . '000';

        return view('admin.market.discount.copan.edit', compact('copan', 'costumers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CopanRequest $request, Copan $copan)
    {
        $inputs = $request->all();

        // start date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        
        // end date fixed
        $realTimestampStart = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        if(!isset($inputs['user_id'])){
            $inputs['user_id'] = null;
        }

        $copan->update($inputs);
        return to_route('admin.market.discount.copan.index')
        ->with('alert-section-success', 'ویرایش کوپن تخفیف با شماره شناسه   '.$copan['id'].' با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Copan $copan)
    {
        $result = $copan->delete();
        return to_route('admin.market.discount.copan.index')
        ->with('alert-section-success', ' کوپن تخفیف با شماره شناشه '.$copan->id.' با موفقیت حذف شد');
    }

         /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Copan $copan)
    {
        $copan->status = $copan->status == 0 ? 1 : 0;
        $result = $copan->save();

        if($result){
            if($copan->status == 0){
                return response()->json(['status' => true, 'checked' => false, 'id' => $copan->id]);
            }else{
                return response()->json(['status' => true, 'checked' => true, 'id' => $copan->id]);
            }
        }else{
            return response()->json(['status' => false]);
        }
    }
}
