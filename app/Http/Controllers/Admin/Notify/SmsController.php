<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Models\Notify\SMS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notify\SMSRequest;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $smses = SMS::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.notify.sms.index', compact('smses'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notify.sms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SMSRequest $request, SMS $sms)
    {
        $inputs = $request->all();

        // date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        // store data in database
        $sms->create($inputs);
        return redirect()->route('admin.notify.sms.index')
        ->with('alert-section-success', 'اعلامیه پیامکی جدید شما با موفقیت ثبت شد');
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
    public function edit(SMS $sms)
    {
        $timestampStart = strtotime($sms['published_at']);
        $sms['published_at'] = $timestampStart . '000';

        return view('admin.notify.sms.edit', compact('sms'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SMSRequest $request, SMS $sms)
    {

        $inputs = $request->all();

        // date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        $sms->update($inputs);
        return redirect()->route('admin.notify.sms.index')
        ->with('alert-section-success', 'ویرایش اعلامیه پیامیکی شماره   '.$sms['id'].' با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SMS $sms)
    {
        $result = $sms->delete();
        return redirect()->route('admin.notify.sms.index')
        ->with('alert-section-success', 'اعلامیه پیامکی شماره '.$sms->id.' با موفقیت حذف شد');
    }



     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(SMS $sms)
    {
        $sms->status = $sms->status == 0 ? 1 : 0;
        $result = $sms->save();

        if($result){
            if($sms->status == 0){
                return response()->json(['status' => true, 'checked' => false, 'id' => $sms->id]);
            }else{
                return response()->json(['status' => true, 'checked' => true, 'id' => $sms->id]);
            }
        }else{
            return response()->json(['status' => false]);
        }
    }
}
