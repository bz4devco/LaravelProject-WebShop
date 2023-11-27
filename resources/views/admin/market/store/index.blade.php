@extends('admin.layouts.master')

@section('haed-tag')
<title>انبار | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.store.add-to-store') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item active" aria-current="page">انبار</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                انبار
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="#" class="btn btn-sm btn-info text-white disabled">ایجاد انبار جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark">
                        <th>#</th>
                        <th>نام کالا</th>
                        <th>تصویر کالا</th>
                        <th>موجودی</th>
                        <th>ورودی انبار</th>
                        <th>خروجی انبار</th>
                        <th>وضعیت</th>
                        <th class="max-width-22-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        <tr class="align-middle">
                            <th>1</th>
                            <td>سامسونک LED</td>
                            <td><img src="{{ asset('admin-assets/images/avatar-2.jpg') }}" class="max-height-2rem" alt="برند"></td>
                            <td>16</td>
                            <td>38</td>
                            <td>22</td>
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
                            <td class="width-22-rem text-start">
                                <a href="{{ route('admin.market.store.index-add-to-store') }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>افزایش موجودی</a>
                                <a href="" class="btn btn-warning btn-sm"><i class="fa fa-edit ms-2"></i>اصلاح موجودی</a>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <th></th>
                            <td>لپ تاپ سامصونگ</td>
                            <td><img src="{{ asset('admin-assets/images/avatar-2.jpg') }}" class="max-height-2rem" alt="برند"></td>
                            <td>26</td>
                            <td>51</td>
                            <td>25</td>
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
                            <td class="width-22-rem text-start">
                                <a href="{{ route('admin.market.store.index-add-to-store') }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>افزایش موجودی</a>
                                <a href="" class="btn btn-warning btn-sm"><i class="fa fa-edit ms-2"></i>اصلاح موجودی</a>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <th>3</th>
                            <td>موبایل سامسونک</td>
                            <td><img src="{{ asset('admin-assets/images/avatar-2.jpg') }}" class="max-height-2rem" alt="برند"></td>
                            <td>44</td>
                            <td>61</td>
                            <td>17</td>
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
                                <a href="{{ route('admin.market.store.index-add-to-store') }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>افزایش موجودی</a>
                                <a href="" class="btn btn-warning btn-sm"><i class="fa fa-edit ms-2"></i>اصلاح موجودی</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection