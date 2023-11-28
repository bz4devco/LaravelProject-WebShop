@extends('admin.layouts.master')

@section('haed-tag')
<title>تیکت های باز | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش تیکت ها</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.ticket.index') }}">تیکت ها</a></li>
    <li class="breadcrumb-item active" aria-current="page">تیکت های باز</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                تیکت های باز
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="#" class="btn btn-sm btn-info text-white disabled">ایجاد تیکت جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark">
                        <th>#</th>
                        <th>نویسنده تیکت</th>
                        <th>عنوان تیکت</th>
                        <th>دسته تیکت</th>
                        <th>اولویت تیکت</th>
                        <th>ارجاع شده</th>
                        <th>وضعیت</th>
                        <th class="text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        <tr class="align-middle">
                            <th>1</th>
                            <td>حامد محمدی</td>
                            <td>پرداخت انجام نمیشه!</td>
                            <td>دسته فروش</td>
                            <td>فوری</td>
                            <td>-</td>
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
                            <td class="text-start">
                                <a href="{{ route('admin.ticket.show') }}" class="btn btn-primary btn-sm"><i class="fa fa-eye ms-2"></i>مشاهده</a>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <th>2</th>
                            <td>مهرداد ایمانی</td>
                            <td>مشکل در پرداخت!</td>
                            <td>دسته فروش</td>
                            <td>فوری</td>
                            <td>کامران محمدی</td>
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
                            <td class="text-start">
                                <a href="{{ route('admin.ticket.show') }}" class="btn btn-primary btn-sm"><i class="fa fa-eye ms-2"></i>مشاهده</a>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <th>3</th>
                            <td>حامد محمدی</td>
                            <td>مشکل سبد خرید!</td>
                            <td>دسته فروش</td>
                            <td>فوری</td>
                            <td>-</td>
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
                            <td class="text-start">
                                <a href="{{ route('admin.ticket.show') }}" class="btn btn-primary btn-sm"><i class="fa fa-eye ms-2"></i>مشاهده</a>
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