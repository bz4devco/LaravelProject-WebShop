@extends('admin.layouts.master')

@section('haed-tag')
<title>سوالات متداول | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش محتوی</a></li>
    <li class="breadcrumb-item active" aria-current="page">سوالات متداول</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                سوالات متداول
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.content.faq.create') }}" class="btn btn-sm btn-info text-white">ایجاد پرسش جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark">
                        <th>#</th>
                        <th>پرسش</th>
                        <th>خلاصه پاسخ</th>
                        <th>وضعیت</th>
                        <th class="max-width-16-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        <tr class="align-middle">
                            <th>1</th>
                            <td>چجوری میتونیم ثبت نام کنیم؟</td>
                            <td  class="text-truncate" style="max-width: 120px;">به بخش ثبت نام مراجعه نمایید و از انجا ثبت نام نمایید</td>
                            <td class="row m-0 align-items-center">
                                <div class="col-md-8 px-1">
                                    <select class="form-select form-select-sm form-select" style="min-width:3rem" name="status" id="status">
                                        <option value="1">فعال</option>
                                        <option value="0">غیر فعال</option>
                                    </select>
                                </div>
                                <div class="col-md-4 px-1">
                                    <button type="submit" class="btn btn-success btn-sm w-100">ثبت</button>
                                </div>
                            </td>
                            <td class="width-16-rem text-start">
                                <a href="#" class="btn btn-primary btn-sm text-white"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash ms-2"></i>حذف</button>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <th>2</th>
                            <td>چجوری خرید کنیم؟</td>
                            <td  class="text-truncate" style="max-width: 120px;">برای خرید ابتدا به بخش محصولات مراجعه نماید و از دسته بندی مورد نظر محصول خود راد انتخاب نمایدد</td>
                            <td class="row m-0 align-items-center">
                                <div class="col-md-8 px-1">
                                    <select class="form-select form-select-sm form-select" style="min-width:3rem" name="status" id="status">
                                        <option value="1">فعال</option>
                                        <option value="0">غیر فعال</option>
                                    </select>
                                </div>
                                <div class="col-md-4 px-1">
                                    <button type="submit" class="btn btn-success btn-sm w-100">ثبت</button>
                                </div>
                            </td>
                            <td class="width-16-rem text-start">
                                <a href="#" class="btn btn-primary btn-sm text-white"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash ms-2"></i>حذف</button>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <th>3</th>
                            <td>بعد از پرداخت بانک سفارش ثبت نشد؟</td>
                            <td  class="text-truncate" style="max-width: 120px;">با پشتیبانی تماس بگیرید و سریعا به کارشناسان فروشگاه اطلاع دهید تا وجه شما بازگشت داده شود.</td>
                            <td class="row m-0 align-items-center">
                                <div class="col-md-8 px-1">
                                    <select class="form-select form-select-sm form-select" style="min-width:3rem" name="status" id="status">
                                        <option value="1">فعال</option>
                                        <option value="0">غیر فعال</option>
                                    </select>
                                </div>
                                <div class="col-md-4 px-1">
                                    <button type="submit" class="btn btn-success btn-sm w-100">ثبت</button>
                                </div>
                            </td>
                            <td class="width-16-rem text-start">
                                <a href="#" class="btn btn-primary btn-sm text-white"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash ms-2"></i>حذف</button>
                            </td>
                        </tr>
                </table>
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection