@extends('admin.layouts.master')

@section('haed-tag')
<title> فاکتور سفارش | پنل مدیریت </title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.order.total-order') }}">سفارشات</a></li>
        <li class="breadcrumb-item active" aria-current="page">فاکتور</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row" id="print-section">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    فاکتور
                </h5>
            </section>
            <section class="table-responsive overflow-x-auto">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr class="bg-custom-blue text-white align-middle">
                            <th>کد سفارش : {{$order->id}}</th>
                            <td class="max-width-8-rem text-start">
                                <button type="button" id="print" class="btn btn-dark btn-sm text-white">
                                    <i class="fa fa-print"></i>
                                    چاپ
                                </button>
                                <a href="{{ route('admin.market.order.detail-order', $order->id) }}" class="btn btn-warning btn-sm ">
                                    <i class="fa fa-book"></i>
                                    جزئیات
                                </a>
                            </td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>نام مشتری</th>
                            <td class="text-start fw-bolder">{{$order->user->full_name ?? '-'}}</td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>آدرس کاربر</th>
                            <td class="text-start fw-bolder">{{$order->address->address ?? '-'}}</td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>شهر</th>
                            <td class="text-start fw-bolder">{{$order->address->city->name ?? '-'}}</td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>کد پستی</th>
                            <td class="text-start fw-bolder">{{$order->address->postal_code ?? '-'}}</td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>پلاک</th>
                            <td class="text-start fw-bolder">{{$order->address->no ?? '-'}}</td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>واحد</th>
                            <td class="text-start fw-bolder">{{$order->address->unit ?? '-'}}</td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>نام تحویل گیرنده</th>
                            <td class="text-start fw-bolder">{{$order->address->recipient_first_name ?? '-'}}</td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>نام خانوادگی تحویل گیرنده</th>
                            <td class="text-start fw-bolder">{{$order->address->recipient_last_name ?? '-'}}</td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>شماره تماس تحویل گیرنده</th>
                            <td class="text-start fw-bolder">{{$order->address->mobile ?? '-'}}</td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>درگاه بانکی</th>
                            <td class="text-start fw-bolder">
                                {{$order->payment->paymentable->gateway ?? '-'}}
                            </td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>نوع پرداخت</th>
                            <td class="text-start fw-bolder">
                                {{$order->payment_type_value}}
                            </td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>تاریخ پرداخت</th>
                            <td class="text-start fw-bolder">
                                {{jalaliDate($order->payment->created_at) ?? '-'}}
                            </td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>وضعیت پرداخت</th>
                            <td class="text-start fw-bolder">
                                {{$order->payment_status_value}}
                            </td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>مبلغ ارسال</th>
                            <td class="text-start fw-bolder">
                                {{number_format($order->delivery_amount) ?? 0}} تومان
                            </td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>وضعیت ارسال</th>
                            <td class="text-start fw-bolder">
                                {{$order->delivery_status_value}}
                            </td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>تاریخ ارسال</th>
                            <td class="text-start fw-bolder">
                                {{$order->delivery_date ? jalaliDate($order->delivery_date) : '-'}}
                            </td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>وضعیت سفارش</th>
                            <td class="text-start fw-bolder">
                                {{$order->order_status_value}}
                            </td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>مجموع مبلغ سفارش
                                <small>(بدون اعمال تخفیف)</small>
                            </th>
                            <td class="text-start fw-bolder">
                                {{$order->order_final_amount ? number_format($order->order_final_amount) : 0}} <span>تومان</span>
                            </td>
                        </tr>
                        @if($order->copan)
                        <tr class="align-middle border-bottom">
                            <th>کوپن تخفیف استفاده شده</th>
                            <td class="text-start fw-bolder">
                                {{$order->copan->code ?? "-"}}
                            </td>
                        </tr>
                        @if($order->copan->amount_type == 0)
                        <tr class="align-middle border-bottom">
                            <th>درصد تخفیف کوپن تخفیف</th>
                            <td class="text-start fw-bolder">
                                {{$order->copan ? $order->copan->amount . '%' : "-"}}
                            </td>
                        </tr>
                        @else
                        <tr class="align-middle border-bottom">
                            <th>مبلغ تخفیف کوپن تخفیف</th>
                            <td class="text-start fw-bolder">
                                {{$order->copan ? number_format($order->copan->amount) . ' تومان' : "-"}}
                            </td>
                        </tr>
                        @endif
                        @endif
                        <tr class="align-middle border-bottom">
                            <th>تخفیف عمومی استفاده شده</th>
                            <td class="text-start fw-bolder">
                                {{$order->commonDiscount ? $order->commonDiscount->title : "-"}}
                            </td>
                        </tr>
                        @if($order->commonDiscount)
                        <tr class="align-middle border-bottom">
                            <th>درصد تخفیف عمومی</th>
                            <td class="text-start fw-bolder">
                                {{$order->commonDiscount ? $order->commonDiscount->percentage . '%' : "-"}}
                            </td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>مبلغ تخفیف عمومی</th>
                            <td class="text-start fw-bolder">
                                {{number_format($order->order_common_discount_amount) . ' تومان' ?? "-"}}
                            </td>
                        </tr>
                        @endif
                        <tr class="align-middle border-bottom">
                            <th>مجموع تمامی مبلغ تخفبفات</th>
                            <td class="text-start fw-bolder">
                                {{$order->order_discount_amount ? number_format($order->order_discount_amount) : 0}} <span>تومان</span>
                            </td>
                        </tr>
                        <tr class="align-middle border-bottom">
                            <th>مبلغ تخفیف همه محصولات</th>
                            <td class="text-start fw-bolder">
                                {{number_format($order->order_total_products_discount_amount) ?? 0}} <span>تومان</span>
                            </td>
                        </tr>
                        <tr class="align-middle border-bottom border-2 border-success">
                            <th>مبلغ نهایی</th>
                            <td class="text-start fw-bolder">
                                {{number_format($order->order_final_amount - $order->order_discount_amount)}} <span>تومان</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection
@section('script')
<script src="{{ asset('admin-assets/js/plugin/print/print-factor.js') }}"></script>
@endsection