<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Models\Notify\SMS;
use App\Models\Notify\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notify\EmailRequest;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.notify.email.index', compact('emails'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notify.email.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailRequest $request, Email $email)
    {
        $inputs = $request->all();

        // date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        // store data in database
        $email->create($inputs);
        return redirect()->route('admin.notify.email.index')
        ->with('alert-section-success', 'اعلامیه ایمیلی جدید شما با موفقیت ثبت شد');
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
    public function edit(Email $email)
    {
        $timestampStart = strtotime($email['published_at']);
        $email['published_at'] = $timestampStart . '000';

        return view('admin.notify.email.edit', compact('email'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmailRequest $request, Email $email)
    {
        $inputs = $request->all();

        // date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        $email->update($inputs);
        return redirect()->route('admin.notify.email.index')
        ->with('alert-section-success', 'ویرایش اعلامیه ایمیلی شماره   '.$email['id'].' با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        $result = $email->delete();
        return redirect()->route('admin.notify.email.index')
        ->with('alert-section-success', 'اعلامیه ایمیلی شماره '.$email->id.' با موفقیت حذف شد');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Email $email)
    {
        $email->status = $email->status == 0 ? 1 : 0;
        $result = $email->save();

        if($result){
            if($email->status == 0){
                return response()->json(['status' => true, 'checked' => false, 'id' => $email->id]);
            }else{
                return response()->json(['status' => true, 'checked' => true, 'id' => $email->id]);
            }
        }else{
            return response()->json(['status' => false]);
        }
    }
}
