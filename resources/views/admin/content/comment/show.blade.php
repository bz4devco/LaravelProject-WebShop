@extends('admin.layouts.master')

@section('haed-tag')
<title> نمایش نظر | پنل مدیریت </title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش محتوی</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.comment.index') }}">نظرات</a></li>
    <li class="breadcrumb-item active" aria-current="page">نمایش نظر</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    نمایش نظر
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.content.comment.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="card mb-3">
                 <section class="card-header bg-custom-yellow text-white font-size-14">
                    کامران محمدی- 845362736
                 </section>
                 <section class="card-body">
                    <h5 class="card-title mb-3">مشخصات کالا: ساعت هوشمند apple watch کد کالا: 8974938</h5>
                    <section class="d-flex">
                        <i class="far fa-comments ms-2"></i>
                        <p class="card-text font-size-14">به نظر من ساعت خوبیه ولی تنها مشکلی که داره اینه که وزنش زیاده و زود شارژش تموم میشه!</p>
                    </section>
                 </section>
            </section>
            <section class="">
                <form action="" method="">
                    <section class="row">
                    <section class="col-12">
                            <div class="form-group mb-3">
                                <label for="">پاسخ ادمین</label>
                                <textarea class="form-control form-control-sm d-block" name="" id="" rows="6"></textarea>
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