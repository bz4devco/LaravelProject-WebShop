@extends('admin.layouts.master')

@section('haed-tag')
<title>انبار | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item active" aria-current="page">انبار</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                انبار
                </h5>
            </section>
            @include('admin.alerts.alert-section.success')
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="#" class="btn btn-sm btn-info text-white disabled">ایجاد انبار جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark table-col-count">
                        <th>#</th>
                        <th>نام کالا</th>
                        <th>تصویر کالا</th>
                        <th>تعداد قابل فروش</th>
                        <th>تعداد رزرو شده</th>
                        <th>تعداد فروخته شده</th>
                        <th class="max-width-22-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($products as $product)    
                        <tr class="align-middle">
                            <th>{{$product->id}}</th>
                            <td>{{$product->name}}</td>
                            <td><img src="{{ asset($product->image['indexArray'][$product->image['currentImage']]) }}" class="max-height-2rem"  alt="{{ $product->name }}"></td>
                            <td>{{$product->marketable_number}}</td>
                            <td>{{$product->frozen_number}}</td>
                            <td>{{$product->sold_number}}</td>
                            <td class="width-22-rem text-start">
                                <a href="{{ route('admin.market.store.add-to-store', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>افزایش موجودی</a>
                                <a href="{{ route('admin.market.store.edit', $product->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit ms-2"></i>اصلاح موجودی</a>
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable  py-4">جدول کالا ها خالی می باشد</th>
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
