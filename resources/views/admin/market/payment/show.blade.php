@extends('admin.layouts.master')

@section('haed-tag')
<title> نمایش پرداخت | پنل مدیریت </title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.payment.total-payment') }}">پرداخت ها</a></li>
        <li class="breadcrumb-item active" aria-current="page">نمایش پرداخت</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                نمایش پرداخت
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="card mb-3">
            <section class="card-header bg-info text-white font-size-14 d-flex justify-content-between">
                <strong>{{$payment->user->full_name}}  -  {{$payment->user->id}}</strong>
                    <section class="d-flex">
                        <span class="badge p-2 bg-dark ms-2"> نوع پرداخت: {{$payment->type == 0 ? 'آنلاین' : ($payment->type == 1 ? 'آفلاین' : 'در محل')}}</span>
                    </section>
                </section>
                <section class="card-body">
                    <h5 class="card-title mb-3">مبلغ پرداختی: {{number_format($payment->paymentable->amount)}} تومان &nbsp;-&nbsp; کد تراکنش: {{$payment->paymentable->transaction_id ?? 'بدون تراکنش'}} </h5>
                    <section class="">
                        @isset($payment->paymentable->gateway)
                            <p>درگاه بانکی : {{$payment->paymentable->gateway}}</p>
                        @endisset
                        <p>وضعیت پرداخت : 
                            <span class=" px-2 py-1 rounded text-white bg-{{$payment->type == 0 ? 'success' : ($payment->type == 1 ? 'danger' : 'warning')}}">
                                {{$payment->type == 0 ? 'آنلاین' : ($payment->type == 1 ? 'آفلاین' : 'در محل')}}
                            </span>
                        </p>
                        <p>وضعیت پرداخت : 
                            <span class=" px-2 py-1 rounded text-white bg-{{$payment->status == 0 ? 'warning' : ($payment->status == 1 ? 'success' : ($payment->status == 2 ? 'secondary' : 'danger'))}}">    
                                {{$payment->status == 0 ? 'پرداخت نشده' : ($payment->status == 1 ? 'پرداخت شده' : ($payment->status == 2 ? 'باطل شده' : 'برگشت داده شده'))}}
                            </span>
                        </p>
                        @isset($payment->paymentable->cash_receiver)
                            <p>دریافت کننده وجه پرداختی : {{$payment->paymentable->cash_receiver}}</p>
                        @endisset
                        @isset($payment->paymentable->pay_date)
                            <p>تاریخ دریافت وجه : {{jalaliDate($payment->paymentable->pay_date)}}</p>
                        @endisset
                    </section>
                    <section class="card-footer">
                        <small class="text-success"><i class="fa fa-calendar-alt ms-2"></i>تاریخ پرداخت : {{jalaliDate($payment->paymentable->created_at)}}</small>
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection
@section('script')
<script src="{{ asset('admin-assets/js/plugin/ajaxs/answershow-ajax.js') }}"></script>
@endsection