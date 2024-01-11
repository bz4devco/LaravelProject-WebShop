@extends('admin.layouts.master')

@section('haed-tag')
<title> ایجاد مشتری جدید | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش محتوی</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.user.costumer.index') }}">مشتریان</a></li>
    <li class="breadcrumb-item active" aria-current="page">ایجاد مشتری جدید</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                ایجاد مشتری جدید
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.user.costumer.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form id="form" action="{{ route('admin.user.costumer.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="first_name">نام</label>
                                <input class="form-control form-select-sm" type="text" name="first_name" id="first_name" value="{{old('first_name')}}">
                                @error('first_name')
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
                                <label for="last_name">نام خانوادگی</label>
                                <input class="form-control form-select-sm" type="text" name="last_name" id="last_name" value="{{old('last_name')}}">
                                @error('last_name')
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
                                <label for="email">ایمیل</label>
                                <input class="form-control form-select-sm" type="email" name="email" id="email" value="{{old('email')}}">
                                @error('email')
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
                                <label for="mobile">شماره موبایل</label>
                                <input type="text" class="form-control form-control-sm number" placeholder="×××××××09" max="11" name="mobile" id="mobile" value="{{old('mobile')}}">
                                @error('mobile')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </section>
                        <section class="col-12 my-2 border-top border-bottom my-4 py-3 ">
                            <section class="row">
                                <section class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="password">کلمه عبور</label>
                                        <input class="form-control form-select-sm" type="password" name="password" id="password">
                                        @error('password')
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
                                        <label for="password_confirmation">تکرار کلمه عبور</label>
                                        <input class="form-control form-select-sm" type="password" name="password_confirmation" id="password_confirmation">
                                        @error('password_confirmation')
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
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="image">تصویر</label>
                                <input class="form-control form-select-sm" type="file" name="avatar" id="avatar" accept="image/*">
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
@endsection
