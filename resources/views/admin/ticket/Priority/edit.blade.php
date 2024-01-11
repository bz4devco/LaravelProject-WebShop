@extends('admin.layouts.master')

@section('haed-tag')
<title> ویرایش دسته بندی | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش محتوی</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.content.category.index') }}">دسته بندی</a></li>
    <li class="breadcrumb-item active" aria-current="page">ویرایش دسته بندی</li>
    <li class="breadcrumb-item active" aria-current="page">{{$postCategory->name}}</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->
<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 ویرایش دسته بندی
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.content.category.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form id="form" action="{{ route('admin.content.category.update', $postCategory->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">نام دسته</label>
                                <input class="form-control form-select-sm" type="text" name="name" id="name" value="{{ old('name', $postCategory->name) }}">
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
                                <label for="tags">برچسب ها</label>
                                <input class="form-control form-select-sm d-none" type="text" name="tags" id="tags" value="{{ old('tags' , $postCategory->tags) }}">
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
                                <label for="image">تصویر</label>
                                <input class="form-control form-select-sm" type="file" name="image" id="image"  accept="image/*">
                                @error('image')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                                <section class="row mt-2">
                                    @php   
                                        $number = 1;
                                    @endphp

                                    @foreach($postCategory->image['indexArray'] as $key => $value)
                                    <section class="col-{{ 6 / $number }}">
                                        <div class="form-check p-0">
                                            <input type="radio" class="form-check-input d-none set-image" name="currentImage" value="{{ $key }}" id="{{ $number }}"
                                            @checked($postCategory->image['currentImage']  == $key) >
                                            <label for="{{ $number }}" class="form-check-label">
                                                <img src="{{ asset($value) }}" class="w-100 max-h" alt="">
                                            </label>
                                        </div>
                                    </section>
                                    @php
                                        $number++;
                                    @endphp
                                    @endforeach

                                </section>
                            </div>
                        </section>
                        <section class="col-12 mb-3">
                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <textarea id="description" name="description">{{ old('description', $postCategory->description) }}</textarea>
                                @error('description')
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
                                    <option value="0" @selected(old('status' , $postCategory->status) == 0) >غیر فعال</option>
                                    <option value="1" @selected(old('status' , $postCategory->status) == 1) >فعال</option>
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
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="sort">ترتیب نمایش</label>
                                <div class="input-group  input-group-sm number-spinner">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-border p-btn-num rounded-end" data-dir="up">+</button>
                                    </span>
                                    <input name="sort" id="sort" class="input-step-number form-control number text-center rounded-0" data-char="" type="text" step="1" value="@if (old('sort', $postCategory->sort) > 1) {{old('sort', $postCategory->sort)}} @else {{1}} @endif" min="0" max="">
                                    <span class="input-group-btn ">
                                        <button type="button" class="btn btn-default btn-border p-btn-num rounded-start" data-dir="dwn">-</button>
                                    </span>
                                </div>
                                @error('sort')
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
<script src="{{ asset('admin-assets/js/plugin/form/price-format.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/bootstrap-number-input.js') }}"></script>
<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/select2-input-config.js') }}"></script>
<script>
        CKEDITOR.replace( 'description');
</script>
@endsection