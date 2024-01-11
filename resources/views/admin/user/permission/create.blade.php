@extends('admin.layouts.master')

@section('haed-tag')
<title> ایجاد سطح دسترسی جدید | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش محتوی</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.user.permission.index') }}">دسترسی ها</a></li>
    <li class="breadcrumb-item active" aria-current="page">ایجاد سطح دسترسی جدید</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                ایجاد سطح دسترسی جدید
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.user.permission.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section>
                <form id="form" action="{{ route('admin.user.permission.store') }}" method="post">
                    @csrf
                    <section class="mb-2 pb-3">
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="title">عنوان سطح دسترسی</label>
                                    <input type="text" class="form-control form-control-sm" name="title" id="title" value="{{old('title')}}">
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
                                <div class="form-group mb-3 position-relative">
                                    <label for="name">نام لاتین</label>
                                    <input type="text" class="form-control form-control-sm" name="name" id="name" value="{{old('name')}}">
                                    <small class="text-secondary position-absolute top-100 user-select-none d-block w-100 mb-1">نمونه: create-post, update-post, read-post, delete-post</small>
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
                                    <label for="description">توضیح سطح دسترسی</label>
                                    <input type="text" class="form-control form-control-sm" name="description" id="description" value="{{old('description')}}">
                                    @error('description')
                                        <span class="text-danger font-size-12">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-md-12 d-flex flex-column justify-content-center">
                                <div class="form-group ">  
                                    <button class="btn btn-primary btn-sm">ثبت</button>
                                </div>
                            </section>
                        </section>
                    </section>
                </form>
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection
