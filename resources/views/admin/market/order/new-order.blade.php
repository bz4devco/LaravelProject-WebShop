@extends('admin.layouts.master')

@section('haed-tag')
<title>سفارشات تازه | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item active" aria-current="page">سفارشات تازه</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                سفارشات تازه
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="#" class="btn btn-sm btn-info text-white disabled">ایجاد سفارش جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive overflow-x-auto">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark table-col-count">
                        <th></th>
                        <th>#</th>
                        <th>کد سفارش</th>
                        <th>مجموع مبلغ سفارش
                            <br>
                            <small>(بدون اعمال تخفیف)</small>
                        </th>
                        <th>مجموع تمامی مبلغ تخفبفات</th>
                        <th>مبلغ تخفیف همه محصولات</th>
                        <th>مبلغ نهایی</th>
                        <th>وضعیت پرداخت</th>
                        <th>شیوه پرداخت</th>
                        <th>بانک</th>
                        <th>وضعیت ارسال</th>
                        <th>شیوه ارسال</th>
                        <th>وضعیت سفارش</th>
                        <th class=""><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        
                        {{-- notif for unseen new orders --}}
                        @php
                        $bg_notif = ($order->seen == 0) ? 'bg-new-notif' : '';
                        $icon_notif = ($order->seen == 0) ? 'icon-before-notif' : '';
                        
                        @endphp
                        <tr class="align-middle {{$bg_notif}}">
                            <td class="position-relative {{$icon_notif}}"></td>
                            <th>{{ iteration($loop->iteration, request()->page) }}</th>
                            <td>{{$order->id}}</td>
                            <td>{{number_format($order->order_final_amount)}}<span>تومان</span></td>
                            <td>{{number_format($order->order_discount_amount)}}<span>تومان</span></td>
                            <td>{{number_format($order->order_total_products_discount_amount)}}<span>تومان</span></td>
                            <td>{{number_format($order->order_final_amount - $order->order_discount_amount)}}<span>تومان</span></td>
                            <td><i class="far fa-cart ms-2"></i>
                                {{$order->payment_status_value}}
                            </td>
                            <td>
                                {{$order->payment_type_value}}
                            </td>
                            <td>{{$order->payment->paymentable->gateway ?? '-'}}</td>
                            <td><i class="fas fa-clock ms-1"></i>
                                {{$order->delivery_status_value}}
                            </td>
                            <td>{{$order->delivery->name}}</td>
                            <td>
                                {{$order->order_status_value}}
                            </td>
                            <td>
                                <a class="btn btn-success btn-sm btn-block dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-tools ms-1"></i>عملیات
                                </a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('admin.market.order.show-order', $order->id) }}" class="dropdown-item text-end ms-2"><i class="fa fa-images ms-2"></i>مشاهده فاکتور</a>
                                    <a href="{{ route('admin.market.order.change-send-status', $order->id) }}" class="dropdown-item text-end ms-2"><i class="fa fa-list-ul ms-2"></i>تغییر وضعیت ارسال</a>
                                    <a href="{{ route('admin.market.order.change-order-status', $order->id) }}" class="dropdown-item text-end ms-2"><i class="fa fa-edit ms-2"></i>تغییر وضعیت سفارش</a>
                                    <a href="{{ route('admin.market.order.cancel-order', $order->id) }}" class="dropdown-item text-end ms-2"><i class="fa fa-times ms-3 me-1"></i>باطل کردن سفارش</a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable  py-4">جدول سفارشات جدید خالی می باشد</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <section class="mb-3 mt-5 d-flex justify-content-center border-0">
                    <nav>
                        {{ $orders->links('pagination::bootstrap-5') }}
                    </nav>
                </section>
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection

