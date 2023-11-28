@extends('admin.layouts.master')

@section('haed-tag')
<title>نقش ها | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش کاربران</a></li>
    <li class="breadcrumb-item active" aria-current="page">نقش ها</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                نقش ها
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.user.role.create') }}" class="btn btn-sm btn-info text-white">ایجاد نقش جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark">
                        <th>#</th>
                        <th>نام نقش</th>
                        <th>دسترسی ها</th>
                        <th>وضعیت</th>
                        <th class="max-width-22-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        <tr class="align-middle">
                            <th>1</th>
                            <td>پشتیبانی فروش</td>
                            <td>
                                    1-مشاهده سفارشات
                                    <br>
                                    2-مشاهده پرداخت ها
                                    <br>
                                    3-مشاهده تخفیف ها
                            </td>
                            <td>
                                <section class="row flex-wrap">
                                    <div class="col-md-8 px-1">
                                        <select class="form-select form-select-sm form-select" style="min-width:3rem" name="status" id="status">
                                            <option value="1">فعال</option>
                                            <option value="0">غیر فعال</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <button type="submit" class="btn btn-success btn-sm w-100">ثبت</button>
                                    </div>
                                </section>
                            </td>
                            <td class="width-22-rem text-start">
                                <a href="" class="btn btn-success btn-sm"><i class="fa fa-user-graduate ms-2"></i>دسترسی ها</a>
                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt ms-2"></i>حذف</button>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <th>2</th>
                            <td>مدیریت محتوی</td>
                            <td>
                                    1-مشاهده پست ها
                                    <br>
                                    2-مشاهده پیج ها
                                    <br>
                                    3-مشاهده نظرات
                            </td>
                            <td>
                                <section class="row">
                                    <div class="col-md-8 px-1">
                                        <select class="form-select form-select-sm form-select" style="min-width:3rem" name="status" id="status">
                                            <option value="1">فعال</option>
                                            <option value="0">غیر فعال</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <button type="submit" class="btn btn-success btn-sm w-100">ثبت</button>
                                    </div>
                                </section>
                            </td>
                            <td class="width-22-rem text-start">
                                <a href="" class="btn btn-success btn-sm"><i class="fa fa-user-graduate ms-2"></i>دسترسی ها</a>
                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt ms-2"></i>حذف</button>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <th>3</th>
                            <td>اپراتور تیکت ها</td>
                            <td>
                                    1-مشاهده تیکت ها
                                    <br>
                                    2-بستن تیکت ها
                                    <br>
                                    3-پاسخ تیکت ها
                                    <br>
                                    4-ارجاع به ادمین
                            </td>
                            <td>
                                <section class="row flex-wrap">
                                    <div class="col-md-8 px-1">
                                        <select class="form-select form-select-sm form-select" style="min-width:3rem" name="status" id="status">
                                            <option value="1">فعال</option>
                                            <option value="0">غیر فعال</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <button type="submit" class="btn btn-success btn-sm w-100">ثبت</button>
                                    </div>
                                </section>
                            </td>
                            <td class="width-22-rem text-start">
                                <a href="" class="btn btn-success btn-sm"><i class="fa fa-user-graduate ms-2"></i>دسترسی ها</a>
                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt ms-2"></i>حذف</button>
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