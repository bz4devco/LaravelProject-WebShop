@extends('admin.layouts.master')

@section('haed-tag')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/persian-datepicker/persian-datepicker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/persian-datepicker/persian-datepicker-cheerup.min.css') }}">

<title> ایجاد پست  | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش محتوی</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.content.post.index') }}">پست ها</a></li>
    <li class="breadcrumb-item active" aria-current="page">ایجاد پست</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                ایجاد پست
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.content.post.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form id="form" action="{{ route('admin.content.post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="title">عنوان پست</label>
                                <input class="form-control form-select-sm" type="text" id="title" name="title" value="{{ old('title') }}">
                                @error('title')
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
                                <label for="category_id">انتخاب دسته</label>
                                <select class="form-select form-select-sm" name="category_id" id="category_id">
                                    <option disabled selected>دسته را انتخاب کنید</option>
                                    @foreach($categorys as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id) >{{ $category->name}}</option>
                                    @endforeach
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
                                <label for="image">تصویر</label>
                                <div class="input-group custom-file-button mb-3">
                                <label class="input-group-text font-size-12" for="image">انتخاب فایل</label>
                                <input class="form-control form-select-sm" type="file" name="image" id="image" accept="image/*">
                                </div>
                                @error('image')
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
                                <label for="summery">خلاصه پست</label>
                                <textarea id="summery" name="summery">{{ old('summery') }}</textarea>
                               </div>
                               @error('summery')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                        </section>
                        <section class="col-12 mb-3">
                            <div class="form-group">
                                <label for="body">متن پست</label>
                                <textarea id="body" name="body">{{ old('body') }}</textarea>
                               </div>
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
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="commentable">امکان درج نظر</label>
                                <select class="form-select form-select-sm" name="commentable" id="commentable">
                                    <option value="0" @selected(old('commentable') == 0) >غیر فعال</option>
                                    <option value="1" @selected(old('commentable') == 1) >فعال</option>
                                </select> 
                                @error('commentable')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </section>
                        <section class="col-12">
                            <section class="row">
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
                                <section class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="sort">ترتیب نمایش</label>
                                        <div class="input-group  input-group-sm number-spinner">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-border p-btn-num rounded-end" data-dir="up">+</button>
                                            </span>
                                            <input name="sort" id="sort" class="input-step-number form-control number text-center rounded-0" data-char="" type="text" step="1" value="@if (old('sort')) {{old('sort')}} @else {{1}} @endif" min="0" max="">
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
                            </section>
                        </section>
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
<script src="{{ asset('admin-assets/js/plugin/form/price-format.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/js/persian-datepicker/persian_fromtodatepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/js/persian-datepicker/persian-date.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/js/persian-datepicker/persian-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/js/mask-input/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/datepicker-config.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/bootstrap-number-input.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/select2-input-config.js') }}"></script>
<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
<script>
    /// CKEDITOR config
    CKEDITOR.replace( 'summery');
    CKEDITOR.replace( 'body');
</script>
@endsection