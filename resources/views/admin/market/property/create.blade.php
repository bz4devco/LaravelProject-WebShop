@extends('admin.layouts.master')

@section('haed-tag')
<title>ایجاد فرم جدید | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.property.index') }}">فرم کالا</a></li>
    <li class="breadcrumb-item active" aria-current="page">ایجاد فرم جدید</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 ایجاد فرم جدید
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.market.property.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form action="" method="">
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="">عنوان فرم</label>
                                <input class="form-control form-select-sm" type="text">
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="">فرم والد</label>
                                <select class="form-select form-select-sm" name="" id="">
                                    <option>فرم والد را انتخاب کنید</option>
                                    <option value="24145">الکترونیکی</option>
                                </select>
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="">وضعیت</label>
                                <select class="form-select form-select-sm" name="" id="">
                                    <option>وضعیت را انتخاب کنید</option>
                                    <option value="1">فعال</option>
                                    <option value="0">غیر فعال</option>
                                </select>
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