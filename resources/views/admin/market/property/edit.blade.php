@extends('admin.layouts.master')

@section('haed-tag')
<title>ویرایش فرم | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.property.index') }}">فرم کالا</a></li>
    <li class="breadcrumb-item active" aria-current="page">ویرایش فرم</li>
    <li class="breadcrumb-item active" aria-current="page">{{$categoryAttribute->id}}</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 ویرایش فرم
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.market.property.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form id="form" action="{{ route('admin.market.property.update', $categoryAttribute->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">عنوان فرم</label>
                                <input class="form-control form-select-sm" type="text" name="name" id="name" value="{{old('name', $categoryAttribute->name)}}">
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
                                <label for="unit">واحد اندازه گیری</label>
                                <input class="form-control form-select-sm" type="text" name="unit" id="unit" value="{{old('unit', $categoryAttribute->unit)}}">
                                @error('unit')
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
                                    <option value="{{ $productCategory->id }}" @if (old('category_id', $categoryAttribute->category_id) == $productCategory->id) selected @endif>{{ $productCategory->name }}</option>
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