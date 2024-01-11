@extends('admin.layouts.master')

@section('haed-tag')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/persian-datepicker/persian-datepicker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/persian-datepicker/persian-datepicker-cheerup.min.css') }}">

<title> ایجاد کالا | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.brand.index') }}">کالا ها</a></li>
    <li class="breadcrumb-item active" aria-current="page">ایجاد کالا</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                ایجاد کالا
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.market.product.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form id="form" action="{{ route('admin.market.product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">نام کالا</label>
                                <input class="form-control form-select-sm" type="text" name="name" id="name"  value="{{ old('name') }}">
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
                                <label for="category_id">دسته کالا</label>
                                <select class="form-select form-select-sm" name="category_id" id="category_id">
                                <option disabled readonly selected>دسته کالا را انتخاب کنید</option>
                                    @forelse($productCategoreis as $productCategory)
                                    <option value="{{ $productCategory->id }}" @selected(old('category_id') == $productCategory->id) >{{ $productCategory->name }}</option>
                                    @empty
                                    <option class="text-center" disabled readonly>دسته ای در جدول دسته بندی ها وجود ندارد</option>
                                    @endforelse
                                </select>
                                @error('category_id')
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
                                <label for="brand_id">برند کالا</label>
                                <select class="form-select form-select-sm" name="brand_id" id="brand_id">
                                    <option disabled readonly selected>برند کالا را انتخاب کنید</option>
                                    @forelse($brands as $brand)
                                    <option value="{{ $brand->id }}"  @selected(old('brand_id') == $brand->id) >{{ $brand->persian_name }}</option>
                                    @empty
                                    <option class="text-center" disabled readonly>برندی در جدول برندها وجود ندارد</option>
                                    @endforelse
                                </select>
                                @error('brand_id')
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
                                <label for="image">تصویر</label>
                                <input class="form-control form-select-sm" type="file" name="image" id="image">
                                @error('image')
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
                                <label for="price">قیمت کالا</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control form-price form-control-sm  number money" name="price" id="price" value="{{old('price')}}" placeholder="100,000" aria-label="100,000" aria-describedby="product-price">                                
                                    <span class="input-group-text" id="product-price">تومان</span>
                                </div>
                                @error('price')
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
                                <label for="startdate">تاریخ انتشار</label>
                                <input type="text" name="published_at" id="startdate_altField" class="form-control form-control-sm d-none" autocomplete="off"/>
                                <input type="text" id="startdate" class="form-control form-control-sm" autocomplete="off"  value="{{ old('published_at') }}" />
                                @error('published_at')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </section>
                        <section class="col-12">
                            <fieldset class="reset d-block mb-3">
                                <legend class="reset"><strong>مشخصات فیزیکی محصول</strong></legend>
                                <section class="row">
                                    <section class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="weight">وزن <small>(کیلوگرم)</small></label>
                                            <input class="form-control form-select-sm" type="text" name="weight" id="weight" value="{{ old('weight') }}">
                                            @error('weight')
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
                                            <label for="length">طول <small>(سانتیمتر)</small></label>
                                            <input class="form-control form-select-sm" type="text" name="length" id="length" value="{{ old('length') }}">
                                            @error('length')
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
                                            <label for="width">عرض <small>(سانتیمتر)</small></label>
                                            <input class="form-control form-select-sm" type="text" name="width" id="width" value="{{ old('width') }}">
                                            @error('width')
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
                                            <label for="height">ارتفاع <small>(سانتیمتر)</small></label>
                                            <input class="form-control form-select-sm" type="text" name="height" id="height" value="{{ old('height') }}">
                                            @error('height')
                                                <span class="text-danger font-size-12">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </section>
                                </section>
                            </fieldset>
                        </section>
                        <section class="col-12">
                            <div class="form-group mb-3">
                                <label for="tags">برچسب ها</label>
                                <input class="form-control form-select-sm d-none" type="text" name="tags" id="tags" value="{{ old('tags') }}">
                                <select name="" id="select_tags" class="select2 form-control-sm form-control" multiple></select>
                                @error('tags')
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
                                <label for="marketable">وضعیت قابل فروش</label>
                                <select class="form-select form-select-sm" name="marketable" id="marketable">
                                    <option value="0" @selected(old('marketable') == 0) >غیر فعال</option>
                                    <option value="1" @selected(old('marketable') == 1) >فعال</option>
                                </select>
                                @error('marketable')
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
                                    <option value="0" @selected(old('status') == 0) >غیر فعال</option>
                                    <option value="1" @selected(old('status') == 1) >فعال</option>
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
                        <section class="col-12 mb-3">
                            <div class="form-group">
                                <label for="introduction">توضیحات کالا</label>
                                <textarea id="introduction" name="introduction" id="introduction">{{old('introduction')}}</textarea>
                                @error('introduction')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </section>
                        <hr>
                        <section class="col-12 col-md-6 mb-4 mt-2">
                            @if(old('meta_key') || old('meta_value'))

                                {{-- compine key and value old metas --}}
                                @php
                                     $metas = array_combine(old('meta_key') , old('meta_value'));
                                     $inc = 0;
                                @endphp
                                
                                @foreach($metas as $key => $value)
                                <section class="row">
                                    <section class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <input class="form-control form-select-sm" type="text" name="meta_key[]" id="meta_key" placeholder="ویژگی..." value="{{$key}}">
                                        </div>
                                    </section>
                                    <section class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <input class="form-control form-select-sm" type="text" name="meta_value[]" id="meta_value" placeholder="مقدار..." value="{{$value}}">
                                        </div>
                                    </section>
                                </section>
                                @php $inc += 1 @endphp
                                @endforeach
                            @else
                            <section class="row">
                                <section class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <input class="form-control form-select-sm" type="text" name="meta_key[]" id="meta_key" placeholder="ویژگی...">
                                    </div>
                                </section>
                                <section class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <input class="form-control form-select-sm" type="text" name="meta_value[]" id="meta_value" placeholder="مقدار...">
                                    </div>
                                </section>
                            </section>
                            @endif
                            <section class="col-12">
                               <button type="button" id="btn-copy" class="btn btn-success btn-sm">افزودن</button>
                           </section>
                        </section>
                        <hr>
                        <section class="col-12">
                            <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
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
<script src="{{ asset('admin-assets/js/plugin/form/datepicker-config.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/bootstrap-number-input.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/generate-meta-input.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/price-format.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/select2-input-config.js') }}"></script>
<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
<script>
        CKEDITOR.replace( 'introduction');
</script>

@endsection
