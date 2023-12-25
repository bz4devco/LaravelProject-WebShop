@extends('admin.layouts.master')

@section('haed-tag')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/persian-datepicker/persian-datepicker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/persian-datepicker/persian-datepicker-cheerup.min.css') }}">

<title> ویرایش فروش شگفت انگیز | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.discount.amazing-sale.index') }}">فروش شگفت انگیز</a></li>
    <li class="breadcrumb-item active" aria-current="page">ویرایش فروش شگفت انگیز</li>
    <li class="breadcrumb-item active" aria-current="page">{{$amazingSale->product->name}}</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                ویرایش فروش شگفت انگیز
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.market.discount.amazing-sale.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form id="form" class="num-input-check" action="{{ route('admin.market.discount.amazing-sale.update', $amazingSale->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="product_id">نام کالا</label>
                                <select class="form-select form-select-sm" name="product_id" id="product_id">
                                    <option disabled readonly selected>کالای مورد نظر را انتخاب کنید</option>
                                    @forelse($productsName as $productName)
                                    <option value="{{$productName->id}}" @if (old('product_id', $amazingSale->product_id) == $productName->id) selected @endif>{{$productName->name}}</option>
                                    @empty
                                    <option class="text-center" disabled readonly>کالا ای در جدول کالاها وجود ندارد</option>
                                    @endforelse
                                </select>
                                @error('product_id')
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
                                <label for="percentage">درصد تخفیف</label>
                                <div class="input-group  input-group-sm number-spinner">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-border p-btn-num rounded-end" data-dir="up">+</button>
                                    </span>
                                    <input class="input-step-number form-control number text-center rounded-0" name="percentage" id="percentage" value="{{old('percentage', $amazingSale->percentage) ?? 0}}%" data-char="%" type="text" step="5" min="0" max="100">
                                    <span class="input-group-btn ">
                                        <button type="button" class="btn btn-default btn-border p-btn-num rounded-start" data-dir="dwn">-</button>
                                    </span>
                                </div> 
                                @error('percentage')
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
                                <label for="startdate">تاریخ شروع</label>
                                <input type="text" name="start_date" id="startdate_altField" class="form-control form-control-sm d-none"  value="{{ old('start_date', $amazingSale->start_date) }}" autocomplete="off"/>
                                <input type="text" id="startdate" class="form-control form-control-sm" autocomplete="off" />
                                @error('start_date')
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
                                <label for="enddate">تاریخ پایان</label>
                                <input type="text" name="end_date" id="enddate_altField" class="form-control form-control-sm d-none" value="{{ old('end_date', $amazingSale->end_date) }}" autocomplete="off"/>
                                <input type="text" id="enddate" class="form-control form-control-sm" autocomplete="off" />
                                @error('end_date')
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
                                    <option value="0" @if (old('status', $amazingSale->status) == 0) selected @endif>غیر فعال</option>
                                    <option value="1" @if (old('status', $amazingSale->status) == 1) selected @endif>فعال</option>
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
<script type="text/javascript" src="{{ asset('admin-assets/js/persian-datepicker/persian_fromtodatepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/js/persian-datepicker/persian-date.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/js/persian-datepicker/persian-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/js/mask-input/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/bootstrap-number-input.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/price-format.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/generate-discount-code.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/datepicker-config.js') }}"></script>

<script>
    let startDateTime = new persianDate(parseInt($('#startdate_altField').val())).format("YYYY/MM/DD hh:mm:ss");
    $('#startdate').val(startDateTime);
    
    let endDateTime = new persianDate(parseInt($('#enddate_altField').val())).format("YYYY/MM/DD hh:mm:ss");
    $('#enddate').val(endDateTime);

</script>
@endsection