@extends('customer.layouts.master-two-col')

@section('haed-tag')
<meta name="robots" content="noindex, nofollow">

<title>سفارش های من | {{$setting->title}}</title>
@endsection

@section('content')
<section class="content-wrapper bg-white p-3 rounded-2 mb-2">

    <!-- start vontent header -->
    <section class="content-header">
        <section class="d-flex justify-content-between align-items-center">
            <h2 class="content-header-title">
                <span>تاریخچه سفارشات</span>
            </h2>
        </section>
    </section>
    <!-- end vontent header -->


    <section class="d-flex justify-content-center my-4">
        <a class="btn btn-outline-dark btn-sm mx-1" href="{{ route('customer.profile.order.orders') }}">همه</a>
        <a class="btn btn-outline-primary btn-sm mx-1" href="{{ route('customer.profile.order.orders', 'type=0') }}">در انتظار تایید</a>
        <a class="btn btn-outline-danger btn-sm mx-1" href="{{ route('customer.profile.order.orders', 'type=1')  }}">تایید نشده</a>
        <a class="btn btn-outline-success btn-sm mx-1" href="{{ route('customer.profile.order.orders', 'type=2') }}">تایید شده</a>
        <a class="btn btn-outline-warning btn-sm mx-1" href="{{ route('customer.profile.order.orders', 'type=3') }}">باطل شده</a>
        <a class="btn btn-outline-secondary btn-sm mx-1" href="{{ route('customer.profile.order.orders', 'type=4') }}">مرجوعی</a>
    </section>


    <!-- start content header -->
    <section class="content-header mb-3">
        <section class="d-flex justify-content-between align-items-center">
            <h2 class="content-header-title content-header-title-small">
                در انتظار پرداخت
            </h2>
        </section>
    </section>
    <!-- end content header -->


    <section class="order-wrapper">
        @forelse ($orders as $order)
        <section class="order-item">
            <section class="d-flex justify-content-between">
                <section>
                    <section class="order-item-date"><i class="fa fa-calendar-alt"></i>{{jalaliDate($order->created_at)}} </section>
                    <section class="order-item-id"><i class="fa fa-id-card-alt"></i>کد سفارش : {{$order->id}}</section>
                    <section class="order-item-status"><i class="fa fa-clock"></i> {{$order->paymentStatusValue}} </section>
                    <section class="order-item-products">
                        @foreach($order->orderItems as $orderItem)
                        <a target="_blank" href="{{ route('customer.market.product', json_decode($orderItem->products)->id) }}">
                            <img src="{{ hasFileUpload(json_decode($orderItem->products)->image->indexArray->small) }}">
                        </a>
                        @endforeach
                    </section>
                </section>
                <section class="order-item-link"><a href="#">پرداخت سفارش</a></section>
            </section>
        </section>
        @empty
        <section class="order-item pt-3">
            <section class="d-flex justify-content-center py-4 my-3">
                <strong>سفارشی وجود ندارد</strong>
            </section>
        </section>
        @endforelse
    </section>
</section>
@endsection
@section('script')

@include('customer.alerts.sweetalert.success')
@include('customer.alerts.sweetalert.error')

@endsection