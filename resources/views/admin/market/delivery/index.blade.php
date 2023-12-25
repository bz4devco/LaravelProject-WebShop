@extends('admin.layouts.master')

@section('haed-tag')
<!-- status switch on list -->
<link rel="stylesheet" href="{{ asset('admin-assets/css/component-custom-switch.css') }}">

<title>روش های ارسال | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item active" aria-current="page">روش های ارسال</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    روش های ارسال
                </h5>
            </section>
            @include('admin.alerts.alert-section.success')
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.market.delivery.create') }}" class="btn btn-sm btn-info text-white">ایجاد روش ارسال جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive">
                <table class="table table-striped table-hover">
                <thead class="border-bottom border-dark table-col-count">
                        <th>#</th>
                        <th>نام روش ارسال</th>
                        <th>هزینه ارسال</th>
                        <th>زمان ارسال</th>
                        <th>وضعیت</th>
                        <th class="max-width-16-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($delivery_methods as $delivery_method)
                        <tr class="align-middle">
                            <th>{{ $delivery_method->id}}</th>
                            <td>{{ $delivery_method->name }}</td>
                            <td><span>{{ number_format($delivery_method->amount) }} <span>تومان</span></span></td>
                            <td>{{ $delivery_method->delivery_time . ' ' . $delivery_method->delivery_time_unit }}</td>
                            <td>
                                <section>
                                    <div class="custom-switch custom-switch-label-onoff d-flex align-content-center" dir="ltr">
                                        <input data-url="{{ route('admin.market.delivery.status', $delivery_method->id) }}" onchange="changeStatus(this.id)" class="custom-switch-input" id="{{ $delivery_method->id }}" name="status" type="checkbox" @if($delivery_method->status) checked @endif >
                                        <label class="custom-switch-btn" for="{{ $delivery_method->id }}"></label>
                                    </div>
                                </section>
                            </td>
                            <td class="width-16-rem text-start">
                                <a href="{{ route('admin.market.delivery.edit', $delivery_method->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                <form class="d-inline" action="{{ route('admin.market.delivery.destroy', $delivery_method->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="{{ $delivery_method->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash ms-2"></i>حذف</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable py-4">جدول روش های ارسال خالی می باشد</th>
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

@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete','fieldTitle' => 'روش ارسال'])


@endsection