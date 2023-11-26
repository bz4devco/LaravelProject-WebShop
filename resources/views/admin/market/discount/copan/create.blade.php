@extends('admin.layouts.master')

@section('haed-tag')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/persian-datepicker/persian-datepicker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/persian-datepicker/persian-datepicker-cheerup.min.css') }}">

<title> ایجاد کوپن تخفیف | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.category.index') }}">دسته بندی</a></li>
    <li class="breadcrumb-item active" aria-current="page">ایجاد کوپن تخفیف</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                ایجاد کوپن تخفیف
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.market.discount.copan.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form action="" method="">
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="">کد کوپن تخفیف</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control generate-discount-code" placeholder="" aria-label="" readonly>
                                    <button class="btn btn-success" id="generate-discount-code-btn" onclick="gnetareDiscountCode('copy-clipboard')" type="button">ایجاد کد تخفیف</button>
                                    <button class="btn btn-secondary disabled" id="copy-clipboard" onclick="copyToClipBoard('generate-discount-code', this.id)" type="button">کپی کد تخفیف</button>
                                </div>                    
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="">نوع کوپن</label>
                                <select class="form-select form-select-sm" name="" id="">
                                    <option>نوع کوپن را انتخاب کنید</option>
                                    <option value="">عمومی</option>
                                    <option value="">خصوصی</option>
                                </select>
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="">درصد تخفیف</label>
                                <div class="input-group  input-group-sm number-spinner">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-border p-btn-num rounded-end" data-dir="up">+</button>
                                    </span>
                                    <input id="after" class="form-control text-center rounded-0" type="text" step="5" value="0" min="0" max="100">
                                    <span class="input-group-btn ">
                                        <button type="button" class="btn btn-default btn-border p-btn-num rounded-start" data-dir="dwn">-</button>
                                    </span>
                                </div>
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="">حداکثر تخفیف</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control form-price form-control-sm  number money" placeholder="100,000" aria-label="100,000" aria-describedby="deliver-price">
                                    <span class="input-group-text" id="deliver-price">تومان</span>
                                </div>
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="">عنوان مناسبت</label>
                                <input class="form-control form-control-sm" type="text">
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="">تاریخ شروع</label>
                                <input type="text" name="startdate" id="startdate" class="form-control form-control-sm" autocomplete="off" />
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="">تاریخ پایان</label>
                                <input type="text" name="enddate" id="enddate" class="form-control form-control-sm" autocomplete="off" />
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="">وضعیت</label>
                                <select class="form-select form-select-sm" name="" id="">
                                    <option>وضعیت را انتخاب کنید</option>
                                    <option value="1">فعال</option>
                                    <option value="0">غیر فعال</option>
                                </select>
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
<script type="text/javascript" src="{{ asset('admin-assets/js/persian-datepicker/persian_fromtodatepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/js/persian-datepicker/persian-date.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/js/persian-datepicker/persian-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/js/mask-input/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('admin-assets/js/bootstrap-number-input.js') }}"></script>
<script src="{{ asset('admin-assets/js/generate-discount-code.js') }}"></script>
<script src="{{ asset('admin-assets/js/copy-clipboard.js') }}"></script>
<script src="{{ asset('admin-assets/js/price-format.js') }}"></script>
<script src="{{ asset('admin-assets/js/datepicker-config.js') }}"></script>
@endsection