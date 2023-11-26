@extends('admin.layouts.master')

@section('haed-tag')
<title>کوپن تخفیف | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item active" aria-current="page">کوپن تخفیف</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                کوپن تخفیف
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.market.discount.copan.create') }}" class="btn btn-sm btn-info text-white">ایجاد کپن تخفیف </a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive overflow-x-auto">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark">
                        <th>#</th>
                        <th>کد کوپن</th>
                        <th>درصد تخفیف</th>
                        <th>سقف تخفیف</th>
                        <th>نوع کوپن</th>
                        <th>تاریخ شروع</th>
                        <th>تاریخ پایان</th>
                        <th>وضعبت</th>
                        <th class="max-width-16-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        <tr class="align-middle">
                            <th>1</th>
                            <td>hd84d8d</td>
                            <td>15%</td>
                            <td><span>25,000<span>تومان</span></span></td>
                            <td>عمومی</td>
                            <td>24 اردیبهشت 1402</td>
                            <td>31 اردیبهشت 1402</td>
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
                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash ms-2"></i>حذف</button>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <th>1</th>
                            <td>hd84d8d</td>
                            <td>15%</td>
                            <td><span>25,000<span>تومان</span></span></td>
                            <td>عمومی</td>
                            <td>24 اردیبهشت 1402</td>
                            <td>31 اردیبهشت 1402</td>
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
                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash ms-2"></i>حذف</button>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <th>1</th>
                            <td>hd84d8d</td>
                            <td>15%</td>
                            <td><span>25,000<span>تومان</span></span></td>
                            <td>عمومی</td>
                            <td>24 اردیبهشت 1402</td>
                            <td>31 اردیبهشت 1402</td>
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
                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash ms-2"></i>حذف</button>
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