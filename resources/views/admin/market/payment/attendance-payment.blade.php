@extends('admin.layouts.master')

@section('haed-tag')
<title>پرداخت در محل | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item active" aria-current="page">پرداخت در محل</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                پرداخت در محل
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="#" class="btn btn-sm btn-info text-white disabled">ایجاد پرداخت جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive overflow-x-auto">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark">
                        <th>#</th>
                        <th>کد تراکنش</th>
                        <th>بانک</th>
                        <th>پرداخت کننده</th>
                        <th>وضعیت پرداخت</th>
                        <th>نوع پرداخت</th>
                        <th class="max-width-22-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        <tr class="align-middle">
                            <th>1</th>
                            <td>6588929</td>
                            <td>ملت</td>
                            <td>کامران محمدی</td>
                            <td>تایید شده</td>
                            <td>آنلاین</td>
                            <td class="width-22-rem text-start">
                                <a href="" class="btn btn-info btn-sm"><i class="fa fa-eye ms-2"></i>مشاهده</a>
                                <a href="" class="btn btn-warning btn-sm">باطل کردن</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-reply ms-2"></i>برگرداندن</button>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <th>2</th>
                            <td>6775765767</td>
                            <td>ملت</td>
                            <td>علیرضا اسفندیاری</td>
                            <td>تایید شده</td>
                            <td>آفلاین</td>
                            <td class="width-22-rem text-start">
                                <a href="" class="btn btn-info btn-sm"><i class="fa fa-eye ms-2"></i>مشاهده</a>
                                <a href="" class="btn btn-warning btn-sm">باطل کردن</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-reply ms-2"></i>برگرداندن</button>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <th>3</th>
                            <td>847675837</td>
                            <td>سپه</td>
                            <td>محمد تبریزی</td>
                            <td>تایید شده</td>
                            <td>آنلاین</td>
                            <td class="width-22-rem text-start">
                                <a href="" class="btn btn-info btn-sm"><i class="fa fa-eye ms-2"></i>مشاهده</a>
                                <a href="" class="btn btn-warning btn-sm">باطل کردن</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-reply ms-2"></i>برگرداندن</button>
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