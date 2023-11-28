@extends('admin.layouts.master')

@section('haed-tag')
<title> ایجاد نقش جدید | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش محتوی</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.user.role.index') }}">نقش ها</a></li>
    <li class="breadcrumb-item active" aria-current="page">ایجاد نقش جدید</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                ایجاد نقش جدید
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.user.role.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section>
                <form action="" method="">
                    <section class="border-bottom mb-2 pb-3">
                        <section class="row">
                            <section class="col-12 col-md-5">
                                <div class="form-group mb-3">
                                    <label for="">عنوان نقش</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-5">
                                <div class="form-group mb-3">
                                    <label for="">توضیح نقش</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-2 mt-4">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </section>
                    <section class="row">
                    <section class="col-md-3 col-sm-6 col-12">
                            <div class="">
                                <input type="checkbox" class="form-check-input" name="" id="check1" checked>
                                <label for="check1" class="form-check-label">نمایش دسته جدید</label>
                            </div>
                        </section>
                        <section class="col-md-3 col-sm-6 col-12">
                            <div class="">
                                <input type="checkbox" class="form-check-input" name="" id="check2" checked>
                                <label for="check2" class="form-check-label">ایجاد دسته جدید</label>
                            </div>
                        </section>
                        <section class="col-md-3 col-sm-6 col-12">
                            <div class="">
                                <input type="checkbox" class="form-check-input" name="" id="check3" checked>
                                <label for="check3" class="form-check-label">ویرایش دسته جدید</label>
                            </div>
                        </section>
                        <section class="col-md-3 col-sm-6 col-12">
                            <div class="">
                                <input type="checkbox" class="form-check-input" name="" id="check4" checked>
                                <label for="check4" class="form-check-label">حذف دسته جدید</label>
                            </div>
                        </section>
                        <section class="col-md-3 col-sm-6 col-12">
                            <div class="">
                                <input type="checkbox" class="form-check-input" name="" id="check5" checked>
                                <label for="check5" class="form-check-label">نمایش کالا جدید</label>
                            </div>
                        </section>
                        <section class="col-md-3 col-sm-6 col-12">
                            <div class="">
                                <input type="checkbox" class="form-check-input" name="" id="check6" checked>
                                <label for="check6" class="form-check-label">ایجاد کالا جدید</label>
                            </div>
                        </section>
                        <section class="col-md-3 col-sm-6 col-12">
                            <div class="">
                                <input type="checkbox" class="form-check-input" name="" id="check7" checked>
                                <label for="check7" class="form-check-label">ویرایش کالا جدید</label>
                            </div>
                        </section>
                        <section class="col-md-3 col-sm-6 col-12">
                            <div class="">
                                <input type="checkbox" class="form-check-input" name="" id="check8" checked>
                                <label for="check8" class="form-check-label">حذف کالا جدید</label>
                            </div>
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
<script src="{{ asset('admin-assets/js/price-format.js') }}"></script>
@endsection
