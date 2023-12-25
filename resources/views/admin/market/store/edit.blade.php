@extends('admin.layouts.master')

@section('haed-tag')
<title> اصلاح موجودی | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.store.index') }}">انبارها</a></li>
    <li class="breadcrumb-item active" aria-current="page">اصلاح موجودی</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 اصلاح موجودی
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.market.store.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form id="form"  action="{{ route('admin.market.store.update', $product->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="marketable_number">تعداد قابل فروش</label>
                                <div class="input-group  input-group-sm number-spinner">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-border p-btn-num rounded-end" data-dir="up">+</button>
                                    </span>
                                    <input class="input-step-number form-control number text-center rounded-0" name="marketable_number" id="marketable_number" value="{{ old('marketable_number', $product->marketable_number)  ? old('marketable_number', $product->marketable_number) : '0' }}" data-char="" type="text" step="1" value="0" min="0" max="">
                                    <span class="input-group-btn ">
                                        <button type="button" class="btn btn-default btn-border p-btn-num rounded-start" data-dir="dwn">-</button>
                                    </span>
                                </div>
                                @error('marketable_number')
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
                                <label for="frozen_number">تعداد رزرو شده</label>
                                <div class="input-group  input-group-sm number-spinner">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-border p-btn-num rounded-end" data-dir="up">+</button>
                                    </span>
                                    <input class="input-step-number form-control number text-center rounded-0"  name="frozen_number" id="frozen_number" value="{{ old('frozen_number', $product->frozen_number)  ? old('frozen_number', $product->frozen_number) : '0' }}" data-char="" type="text" step="1" value="0" min="0" max="">
                                    <span class="input-group-btn ">
                                        <button type="button" class="btn btn-default btn-border p-btn-num rounded-start" data-dir="dwn">-</button>
                                    </span>
                                </div>
                                @error('frozen_number')
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
                                <label for="sold_number">تعداد فروخته شده</label>
                                <div class="input-group  input-group-sm number-spinner">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-border p-btn-num rounded-end" data-dir="up">+</button>
                                    </span>
                                    <input class="input-step-number form-control number text-center rounded-0" name="sold_number" id="sold_number" value="{{ old('sold_number', $product->sold_number)  ? old('sold_number', $product->sold_number) : '0' }}" data-char="" type="text" step="1" value="0" min="0" max="">
                                    <span class="input-group-btn ">
                                        <button type="button" class="btn btn-default btn-border p-btn-num rounded-start" data-dir="dwn">-</button>
                                    </span>
                                </div>
                                @error('sold_number')
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
<script src="{{ asset('admin-assets/js/plugin/form/bootstrap-number-input.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/price-format.js') }}"></script>
<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
<script>
        CKEDITOR.replace( 'product-desc');
</script>

@endsection