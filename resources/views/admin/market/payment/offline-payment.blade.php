@extends('admin.layouts.master')

@section('haed-tag')
<title>پرداخت آفلاین | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
        <li class="breadcrumb-item active" aria-current="page">پرداخت آفلاین</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    پرداخت آفلاین
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="#" class="btn btn-sm btn-info text-white disabled">ایجاد پرداخت جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            @include('admin.alerts.alert-section.success')
            <section class="table-responsive overflow-x-auto">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark table-col-count">
                        <th>#</th>
                        <th>کد تراکنش</th>
                        <th>بانک</th>
                        <th>پرداخت کننده</th>
                        <th>وضعیت پرداخت</th>
                        <th>نوع پرداخت</th>
                        <th class="max-width-22-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($payments as $payment)
                        <tr class="align-middle">
                            <th>{{ iteration($loop->iteration, request()->page) }}</th>
                            <td>{{$payment->paymentable->transaction_id ?? 'بدون کد تراکنش'}}</td>
                            <td>{{$payment->paymentable->gateway ?? '-'}}</td>
                            <td>{{$payment->user->fullname}}</td>
                            <td>{{$payment->status == 0 ? 'پرداخت نشده' : ($payment->status == 1 ? 'پرداخت شده' : ($payment->status == 2 ? 'باطل شده' : 'برگشت داده شده'))}}</td>
                            <td>{{$payment->type == 0 ? 'آنلاین' : ($payment->type == 1 ? 'آفلاین' : 'در محل')}}</td>
                            <td class="width-22-rem text-start">
                                @can('show-order')
                                <a href="{{ route('admin.market.payment.show', $payment->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye ms-2"></i>مشاهده</a>
                                @endcan
                                @can('canceled-payment')
                                <a href="{{ route('admin.market.payment.canceled', $payment->id) }}" class="btn btn-warning btn-sm">باطل کردن</a>
                                @endcan
                                @can('returned-payment')
                                <a href="{{ route('admin.market.payment.returned', $payment->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-reply ms-2"></i>برگرداندن</a>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable  py-4">جدول پرداخت های آفلاین خالی می باشد</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <section class="mb-3 mt-5 d-flex justify-content-center border-0">
                    <nav>
                        {{ $payments->links('pagination::bootstrap-5') }}
                    </nav>
                </section>
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection