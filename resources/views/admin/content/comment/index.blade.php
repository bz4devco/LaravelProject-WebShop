@extends('admin.layouts.master')

@section('haed-tag')
<title>نظرات | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش محتوی</a></li>
    <li class="breadcrumb-item active" aria-current="page">نظرات</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                نظرات
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="#" class="btn btn-sm btn-info text-white disabled">ایجاد نظر جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark">
                        <th>#</th>
                        <th>نویسنده نظر</th>
                        <th>کد کاربر</th>
                        <th>کالا</th>
                        <th>کد کالا</th>
                        <th>وضعیت</th>
                        <th class="max-width-16-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        <tr class="align-middle">
                            <th>1</th>
                            <td>سهیل کاسانی</td>
                            <td>4763874</td>
                            <td>شارژر type C</td>
                            <td>3878646</td>
                            <td>در انتظار تایید</td>
                            <td class="width-16-rem text-start">
                                <a href="{{ route('admin.content.comment.show') }}" class="btn btn-info btn-sm text-white"><i class="fa fa-eye ms-2"></i>نمایش</a>
                                <a href="" class="btn btn-success btn-sm"><i class="fa fa-check ms-2"></i>تایید</a>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <th>2</th>
                            <td>کارمان محمدی</td>
                            <td>476437</td>
                            <td>شیائومی note 20</td>
                            <td>9298832</td>
                            <td>تایید شده</td>
                            <td class="width-16-rem text-start">
                                <a href="{{ route('admin.content.comment.show') }}" class="btn btn-info btn-sm text-white"><i class="fa fa-eye ms-2"></i>نمایش</a>
                                <a href="" class="btn btn-warning btn-sm"><i class="fa fa-clock ms-2"></i>تایید</a>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <th>3</th>
                            <td>پژمانوطن خواه</td>
                            <td>376757</td>
                            <td>ساعت هوشمند aplle watch</td>
                            <td>8974938</td>
                            <td>در انتظار تایید</td>
                            <td class="width-16-rem text-start">
                                <a href="{{ route('admin.content.comment.show') }}" class="btn btn-info btn-sm text-white"><i class="fa fa-eye ms-2"></i>نمایش</a>
                                <a href="" class="btn btn-success btn-sm"><i class="fa fa-check ms-2"></i>تایید</a>
                            </td>
                        </tr>
                </table>
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection