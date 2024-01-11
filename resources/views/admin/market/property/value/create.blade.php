@extends('admin.layouts.master')

@section('haed-tag')
<title>ایجاد مقدار فرم کالا | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.property.index') }}">فرم کالا</a></li>
    <li class="breadcrumb-item active" aria-current="page">ایجاد مقدار فرم کالا</li>
    <li class="breadcrumb-item active" aria-current="page">{{$categoryAttribute->name}}</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 ایجاد مقدار فرم کالا
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.market.property.value.index', $categoryAttribute->id) }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form id="form" action="{{ route('admin.market.property.value.store', $categoryAttribute->id ) }}" method="post">
                    @csrf
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="product_id">انتخاب محصول</label>
                                <select class="form-select form-select-sm" name="product_id" id="product_id">
                                <option disabled readonly selected>محصول را انتخاب کنید</option>
                                    @forelse($categoryAttribute->category->products as $product)
                                    <option value="{{ $product->id }}" @selected(old('product_id') == $product->id) >{{ $product->name }}</option>
                                    @empty
                                    <option class="text-center" disabled readonly>دسته ای در جدول دسته بندی ها وجود ندارد</option>
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
                                <label for="value">مقدار</label>
                                <input class="form-control form-select-sm" type="text" name="value" id="value" value="{{old('value')}}">
                                @error('value')
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
                                <label for="price_increase">افزایش قیمت</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control form-price form-control-sm  number money" name="price_increase" id="price_increase" value="{{old('price_increase')}}" placeholder="100,000" aria-label="100,000" aria-describedby="price_increase">                                
                                    <span class="input-group-text" id="price_increase">تومان</span>
                                </div>
                                @error('price_increase')
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
                                <label for="type">نوع</label>
                                <select class="form-select form-select-sm" name="type" id="type">
                                    <option value="0" @selected(old('type') == 0) >ساده</option>
                                    <option value="1" @selected(old('type') == 1) >انتخابی</option>
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
@endsection