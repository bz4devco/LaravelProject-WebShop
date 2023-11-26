@extends('admin.layouts.master')

@section('haed-tag')
<title>سفارشات | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item active" aria-current="page">سفارشات</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                سفارشات
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="#" class="btn btn-sm btn-info text-white disabled">ایجاد سفارش جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive overflow-x-auto">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark">
                        <th>#</th>
                        <th>کد سفارش</th>
                        <th>مبلغ سفارش</th>
                        <th>مبلغ تخفیف</th>
                        <th>مبلغ نهایی</th>
                        <th>وضعیت پرداخت</th>
                        <th>شیوه پرداخت</th>
                        <th>بانک</th>
                        <th>وضعیت ارسال</th>
                        <th>شیوه ارسال</th>
                        <th>وضعیت سفارش</th>
                        <th class=""><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        <tr class="align-middle">
                            <th>1</th>
                            <td>9908-273645</td>
                            <td><span>381,000<span>تومان</span></span></td>
                            <td><span>34,000<span>تومان</span></span></td>
                            <td><span>347,000<span>تومان</span></span></td>
                            <td><i class="far fa-cart ms-2"></i>پرداخت شده</td>
                            <td>آنلاین</td>
                            <td>ملت</td>
                            <td><i class="fas fa-clock ms-1"></i>در حال ارسال</td>
                            <td>پیک موتوری</td>
                            <td>درحال ارسال</td>
                            <td>
                                <a class="btn btn-success btn-sm btn-block dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-tools ms-1"></i>عملیات
                                </a>
                                <div class="dropdown-menu">
                                    <a href="" class="dropdown-item text-end ms-2"><i class="fa fa-images ms-2"></i>مشاهده فاکتور</a>
                                    <a href="" class="dropdown-item text-end ms-2"><i class="fa fa-list-ul ms-2"></i>تغییر وضعیت ارسال</a>
                                    <a href="" class="dropdown-item text-end ms-2"><i class="fa fa-edit ms-2"></i>تغییر وضعیت سفارش</a>
                                    <a href="" class="dropdown-item text-end ms-2"><i class="fa fa-times ms-3 me-1"></i>باطل کردن سفارش</a>
                                </div>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <th>2</th>
                            <td>9908-273646</td>
                            <td><span>452,000<span>تومان</span></span></td>
                            <td><span>51,000<span>تومان</span></span></td>
                            <td><span>301,000<span>تومان</span></span></td>
                            <td><i class="far fa-cart ms-2"></i>پرداخت شده</td>
                            <td>آفلاین</td>
                            <td>تجارت</td>
                            <td><i class="fas fa-check ms-1"></i>ارسال شده</td>
                            <td>پست پیشتاز</td>
                            <td>تحویل شده</td>
                            <td>
                                <a class="btn btn-success btn-sm btn-block dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-tools ms-1"></i>عملیات
                                </a>
                                <div class="dropdown-menu">
                                    <a href="" class="dropdown-item text-end ms-2"><i class="fa fa-images ms-2"></i>مشاهده فاکتور</a>
                                    <a href="" class="dropdown-item text-end ms-2"><i class="fa fa-list-ul ms-2"></i>تغییر وضعیت ارسال</a>
                                    <a href="" class="dropdown-item text-end ms-2"><i class="fa fa-edit ms-2"></i>تغییر وضعیت سفارش</a>
                                    <a href="" class="dropdown-item text-end ms-2"><i class="fa fa-times ms-3 me-1"></i>باطل کردن سفارش</a>
                                </div>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <th>3</th>
                            <td>9908-273647</td>
                            <td><span>860,000<span>تومان</span></span></td>
                            <td><span>110,000<span>تومان</span></span></td>
                            <td><span>750,000<span>تومان</span></span></td>
                            <td><i class="far fa-cart ms-2"></i>پرداخت نشده</td>
                            <td>حضوری</td>
                            <td>-</td>
                            <td><i class="fas fa-clock ms-1"></i>در حال ارسال</td>
                            <td>پیک موتوری</td>
                            <td>درحال ارسال</td>
                            <td>
                                <a class="btn btn-success btn-sm btn-block dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-tools ms-1"></i>عملیات
                                </a>
                                <div class="dropdown-menu">
                                    <a href="" class="dropdown-item text-end ms-2"><i class="fa fa-images ms-2"></i>مشاهده فاکتور</a>
                                    <a href="" class="dropdown-item text-end ms-2"><i class="fa fa-list-ul ms-2"></i>تغییر وضعیت ارسال</a>
                                    <a href="" class="dropdown-item text-end ms-2"><i class="fa fa-edit ms-2"></i>تغییر وضعیت سفارش</a>
                                    <a href="" class="dropdown-item text-end ms-2"><i class="fa fa-times ms-3 me-1"></i>باطل کردن سفارش</a>
                                </div>
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