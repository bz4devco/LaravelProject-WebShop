@extends('admin.layouts.master')

@section('haed-tag')
<title> ویرایش روش ارسال | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.delivery.index') }}">روش ارسال</a></li>
    <li class="breadcrumb-item active" aria-current="page">ویرایش روش ارسال</li>
    <li class="breadcrumb-item active" aria-current="page">{{$delivery->name}}</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 ویرایش روش ارسال
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.market.delivery.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form id="form" action="{{ route('admin.market.delivery.update', $delivery->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">نام روش ارسال</label>
                                <input class="form-control form-control-sm" type="text" name="name" id="name" value="{{ old('name', $delivery->name) }}">
                                @error('name')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="amount">هزینه ارسال</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control form-price form-control-sm  number money" name="amount" id="amount" value="{{ old('amount', number_format($delivery->amount)) }}" placeholder="100,000" aria-label="100,000" aria-describedby="deliver-price">
                                    <span class="input-group-text" id="deliver-price">تومان</span>
                                </div>
                                @error('amount')
                                <span class="text-danger font-size-12">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="delivery_time">زمان ارسال</label>
                                <input class="form-control form-control-sm number" type="text" name="delivery_time" id="delivery_time" value="{{ old('delivery_time', $delivery->delivery_time) }}">
                                @error('delivery_time')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="delivery_time_unit">زمان ارسال</label>
                                <input class="form-control form-control-sm" type="text" name="delivery_time_unit" id="delivery_time_unit" value="{{ old('delivery_time_unit', $delivery->delivery_time_unit) }}">
                                @error('delivery_time_unit')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="status">وضعیت</label>
                                <select class="form-select form-select-sm" name="status" id="status">
                                    <option value="0" @selected(old('status', $delivery->status) == 0) >غیر فعال</option>
                                    <option value="1" @selected(old('status', $delivery->status) == 1) >فعال</option>
                                </select>
                                @error('status')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </section>
                        <section class="col-12">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </section>
                </form>
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('admin-assets/js/mask-input/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/bootstrap-number-input.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/price-format.js') }}"></script>
@endsection
