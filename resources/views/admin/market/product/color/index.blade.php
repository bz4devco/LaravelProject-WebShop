@extends('admin.layouts.master')

@section('haed-tag')
<!-- status switch on list -->
<link rel="stylesheet" href="{{ asset('admin-assets/css/component-custom-switch.css') }}">

<title>رنگ کالا | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.product.index') }}">کالا ها</a></li>
    <li class="breadcrumb-item active" aria-current="page">رنگ کالا</li>
    <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 رنگ کالا 
                </h5>
            </section>
            @include('admin.alerts.alert-section.success')
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <div>
                    <a href="{{ route('admin.market.product.index') }}" class="btn btn-sm btn-primary text-white">بازگشت</a>
                    <a href="{{ route('admin.market.product.color.create', $product->id) }}" class="btn btn-sm btn-info text-white">ایجاد رنگ جدید </a>
                </div>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive">
                <table class="table table-striped table-hover">
                <thead class="border-bottom border-dark table-col-count">
                        <th>#</th>
                        <th>نام کالا </th>
                        <th>رنگ کالا</th>
                        <th>افزایش قیمت</th>
                        <th>وضعیت</th>
                        <th class="max-width-16-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($product->colors as $color)
                        <tr class="align-middle">
                            <th>{{ $loop->iteration }}</th>
                            <td class="text-truncate" style="max-width: 150px;">{{ $product->name }}</td>
                            <td>{{ $color->name}}</td>
                            <td>{{ number_format($color->price_increase)}} تومان</td>
                            <td>
                                <section>
                                    <div class="custom-switch custom-switch-label-onoff d-flex align-content-center" dir="ltr">
                                        <input data-url="{{ route('admin.market.product.color.status', $color->id) }}" onchange="changeStatus(this.id)" class="custom-switch-input" id="{{ $color->id }}" name="status" type="checkbox" @checked($color->status) >
                                        <label class="custom-switch-btn" for="{{ $color->id }}"></label>
                                    </div>
                                </section>
                            </td>
                            <td class="width-16-rem text-start">
                                <form class="d-inline" action="{{ route('admin.market.product.color.destroy',['product' => $product->id, 'productColor' => $color->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="{{ $color->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash ms-2"></i>حذف</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable  py-4">جدول رنگ کالا خالی می باشد</th>
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
<script src="{{ asset('admin-assets/js/plugin/ajaxs/status-ajax.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/ajaxs/show-in-menu-ajax.js') }}"></script>

@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete','fieldTitle' => 'رنگ '])


@endsection

