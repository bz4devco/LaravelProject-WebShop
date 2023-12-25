@extends('admin.layouts.master')

@section('haed-tag')
<title> جزئیات سفارش | پنل مدیریت </title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.order.total-order') }}">سفارشات</a></li>
        <li class="breadcrumb-item active" aria-current="page">جزئیات سفارش</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row" id="print-section">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                جزئیات سفارش
                </h5>
            </section>
            <section class="table-responsive overflow-x-auto">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark table-col-count">
                        <th>#</th>
                        <th>کد سفارش</th>
                        <th>نام محصول</th>
                        <th>درصد فروش فوق العاده</th>
                        <th>مبلغ تخفیف فروش فوق العاده</th>
                        <th>تعداد</th>
                        <th>رنگ</th>
                        <th>گارانتی</th>
                        <th>ویژگی ها</th>
                        <th>جمع قیمت محصول</th>
                        <th>مبلغ نهایی</th>
                    </thead>
                    <tbody>
                        @forelse($order->orderItems as $item)
                        <tr class="align-middle">
                            <th>{{$loop->iteration}}</th>
                            <td>{{$item->order->id}}</td>
                            <td>{{$item->sengleProduct->name ?? '-'}}</td>
                            <td>{{$item->amazingSale->percentage . '%' ?? '-'}}</td>
                            <td>{{number_format($item->amazing_sale_discount_amount) ?? 0}} <span>تومان</span></td>
                            <td>{{$item->number ?? '-'}}</td>
                            <td>{{$item->color->name ?? '-'}}</td>
                            <td>{{$item->guarantee->name ?? '-'}}</td>
                            <td>
                                @forelse($item->orderItemAttributes as $attribute)
                                <span class="d-block">{{$attribute->categoryAttribute->name . ' : ' . $attribute->categoryAttributeValue->value['value'] ?? '-'}}</span>
                                @empty
                                -
                                @endforelse
                            </td>
                            <td>{{number_format($item->final_product_price) ?? 0}} <span>تومان</span></td>
                            <td>{{number_format($item->final_total_product_price) ?? 0}} <span>تومان</span></td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable  py-4">جدول جزئیات این سفارش  خالی می باشد</th>
                        </tr>
                        @endforelse
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