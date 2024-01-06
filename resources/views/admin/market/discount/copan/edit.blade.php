@extends('admin.layouts.master')

@section('haed-tag')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/persian-datepicker/persian-datepicker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/persian-datepicker/persian-datepicker-cheerup.min.css') }}">

<title> ویرایش کوپن تخفیف | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.discount.copan.index') }}">کوپن تخفیف</a></li>
        <li class="breadcrumb-item active" aria-current="page">ویرایش کوپن تخفیف</li>
        <li class="breadcrumb-item active" aria-current="page">{{$copan->code}}</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    ویرایش کوپن تخفیف
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.market.discount.copan.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form id="form" class="num-input-check" action="{{ route('admin.market.discount.copan.update', $copan->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="code">کد کوپن تخفیف</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control generate-discount-code" placeholder="" aria-label="" id="code" value="{{ old('code', $copan->code) }}" readonly>
                                    <button class="btn btn-secondary" id="copy-clipboard" onclick="copyToClipBoard('generate-discount-code', this.id)" type="button">کپی کد تخفیف</button>
                                </div>
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="type">نوع کوپن</label>
                                <select class="form-select form-select-sm" name="type" id="type">
                                    <option value="0" @if (old('type', $copan->type)==0) selected @endif>عمومی</option>
                                    <option value="1" @if (old('type', $copan->type)==1) selected @endif>خصوصی</option>
                                </select>
                                @error('type')
                                <span class="text-danger font-size-12">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-1">
                                <label for="user_id">کاربر</label>
                                <select class="form-select form-select-sm" name="user_id" id="user_id">
                                    <option class="defualt" disabled readonly selected>کاربر مورد نظر را انتخاب کنید</option>
                                    @forelse($costumers as $costumer)
                                    <option value="{{$costumer->id}}" @if (old('user_id', $copan->user_id) == $costumer->id) selected @endif>{{$costumer->fullname}}</option>
                                    @empty
                                    <option class="text-center" disabled readonly>کاربری در جدول کابران وجود ندارد</option>
                                    @endforelse
                                </select>
                                <small class="text-secondary user-select-none">فیلد اختیاری</small>
                                @error('user_id')
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
                                <label for="amount_type">نوع تخفیف</label>
                                <select class="form-select form-select-sm" name="amount_type" id="amount_type">
                                    <option value="0" @if (old('amount_type', $copan->amount_type)==0) selected @endif>درصدی</option>
                                    <option value="1" @if (old('amount_type', $copan->amount_type)==1) selected @endif>عددی</option>
                                </select>
                                @error('amount_type')
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
                                <div id="flex-state">
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
                        <section class="col-12 col-md-6 mb-1">
                            <div class="form-group mb-3">
                                <label for="discount_ceiling">حداکثر تخفیف</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control form-price form-control-sm  number money" name="discount_ceiling" id="discount_ceiling" value="{{ old('discount_ceiling', $copan->discount_ceiling) }}" placeholder="100,000" aria-label="100,000" aria-describedby="deliver-price">
                                    <span class="input-group-text" id="deliver-price">تومان</span>
                                    <small class="text-secondary position-absolute top-100 user-select-none d-block w-100 mb-1">فیلد اختیاری</small>
                                </div>
                                @error('discount_ceiling')
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
                                <input type="text" name="start_date" id="startdate_altField" class="form-control form-control-sm d-none" value="{{ old('start_date', $copan->start_date) }}" autocomplete="off" />
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
                                <input type="text" name="end_date" id="enddate_altField" class="form-control form-control-sm d-none" value="{{ old('end_date', $copan->end_date) }}" autocomplete="off" />
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
                                    <option value="0" @if (old('status', $copan->status)==0) selected @endif>غیر فعال</option>
                                    <option value="1" @if (old('status', $copan->status)==1) selected @endif>فعال</option>
                                </select>
                                @error('status')
                                <span class="text-danger font-size-12">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </div>
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
<script src="{{ asset('admin-assets/js/plugin/form/copy-clipboard.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/datepicker-config.js') }}"></script>
<script>
    // toggle inputs amount Percentage type and Price type on change amount type
    let isPercentage = `<label for="amount">درصد تخفیف</label> 
    <div class="input-group  input-group-sm number-spinner">
        <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-border p-btn-num rounded-end" data-dir="up">+</button>
        </span>
        <input class="input-step-number form-control number text-center rounded-0" name="amount" id="amount" value="{{ (old('amount_type' , $copan->amount_type) == 0) ? (old('amount', $copan->amount) ?? 0) : 0 }}%" data-char="%" type="text" step="1" min="0" max="100">
        <span class="input-group-btn ">
            <button type="button" class="btn btn-default btn-border p-btn-num rounded-start" data-dir="dwn">-</button>
        </span>
    </div> `,
    isPrice = `<label for="amount">مبلغ تخفیف</label>
    <div class="input-group input-group-sm">
    <input type="text" class="form-control form-price form-control-sm  number money"  name="amount" id="amount" value="{{ (old('amount_type' , $copan->amount_type) == 1) ? old('amount', $copan->amount) : '' }}" placeholder="100,000" aria-label="100,000" aria-describedby="deliver-price">
    <span class="input-group-text" id="deliver-price">تومان</span>
    </div>`;
</script>
<script src="{{ asset('admin-assets/js/plugin/page/copan/copan-edit.js') }}"></script>
@endsection