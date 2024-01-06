@extends('admin.layouts.master')

@section('haed-tag')
<title> ایجاد رنگ | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.product.index') }}">محصولات</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.product.color.index', $product->id) }}">رنگ</a></li>
    <li class="breadcrumb-item active" aria-current="page">ایجاد رنگ</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 ایجاد رنگ
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.market.product.color.index', $product->id) }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form id="form" action="{{ route('admin.market.product.color.store', $product->id) }}" method="post">
                    @csrf
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">نام رنگ</label>
                                <input class="form-control form-select-sm" type="text" name="name" id="name" value="{{ old('name') }}">
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
                            <div class="form-group mb-3">
                                <label for="color">رنگ</label>
                                <input class="form-control form-select-sm" type="color" name="color" id="color" value="{{ old('color') }}">
                                @error('color')
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
                                <label for="status">وضعیت</label>
                                <select class="form-select form-select-sm" name="status" id="status">
                                    <option value="0" @if (old('status') == 0) selected @endif>غیر فعال</option>
                                    <option value="1" @if (old('status') == 1) selected @endif>فعال</option>
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