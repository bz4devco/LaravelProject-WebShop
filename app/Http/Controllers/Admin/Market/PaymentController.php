<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function total()
    {
        $payments = Payment::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.market.payment.total-payment', compact('payments'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function online()
    {
        $payments = Payment::where('paymentable_type', 'App\Models\Market\OnlinePayment')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.market.payment.online-payment', compact('payments'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function offline()
    {
        $payments = Payment::where('paymentable_type', 'App\Models\Market\OfflinePayment')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.market.payment.offline-payment', compact('payments'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cash()
    {
        $payments = Payment::where('paymentable_type', 'App\Models\Market\CashPayment')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.market.payment.cash-payment', compact('payments'));
    }
  

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('admin.market.payment.show', compact('payment'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function canceled(Payment $payment)
    {
        $payment->status = 2;
        $payment->save();
        return redirect(url()->previous())->with('swal-success', 'وضعیت پرداخت با موفقت باطل شد');
    }


        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function returned(Payment $payment)
    {
        $payment->status = 3;
        $payment->save();
        return redirect(url()->previous())->with('swal-success', 'وضعیت پرداخت با موفقت بازگشت داده شد');
    }


 
}
