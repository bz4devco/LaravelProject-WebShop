@extends('admin.layouts.master')

@section('haed-tag')
<title> ایجاد کالا | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.brand.index') }}">کالا ها</a></li>
    <li class="breadcrumb-item active" aria-current="page">ایجاد کالا</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                ایجاد کالا
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.market.product.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form action="" method="">
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="">نام کالا</label>
                                <input class="form-control form-select-sm" type="text">
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="">دسته کالا</label>
                                <select class="form-select form-select-sm" name="" id="">
                                    <option>وضعیت را انتخاب کنید</option>
                                    <option value="4564">وسایل الکترونیکی</option>
                                </select>
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="">دسته کالا</label>
                                <select class="form-select form-select-sm" name="" id="">
                                    <option>وضعیت را انتخاب کنید</option>
                                    <option value="4564">نمایشگر</option>
                                    <option value="6575">موبایل</option>
                                    <option value="8733">لپ تاپ</option>
                                </select>
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="">تصویر</label>
                                <input class="form-control form-select-sm" type="file" name="" id="">
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">قیمت کالا</label>
                            </div>
                            <div class="input-group input-group-sm mb-3">
                            <input type="text" class="form-control form-price form-control-sm  number money" placeholder="100,000" aria-label="100,000" aria-describedby="deliver-price">                                <span class="input-group-text" id="deliver-price">تومان</span>
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="">وزن</label>
                                <input class="form-control form-select-sm" type="text">
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
                        <section class="col-12 mb-3">
                            <div class="form-group">
                                <label for="">توضیحات کالا</label>
                                <textarea id="product-desc"></textarea>
                               </div>
                        </section>
                        <hr>
                        <section class="col-12 col-md-6 mb-4 mt-2">
                            <section class="row">
                                <section class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <input class="form-control form-select-sm" type="text" placeholder="ویژگی...">
                                    </div>
                                </section>
                                <section class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <input class="form-control form-select-sm" type="text" placeholder="مقدار...">
                                    </div>
                                </section>
                                 <section class="col-12">
                                    <button type="button" class="btn btn-success btn-sm">افزودن</button>
                                </section>
                            </section>
                        </section>
                        <hr>
                        <section class="col-12">
                            <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </section>
                </form>
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('admin-assets/js/mask-input/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('admin-assets/js/bootstrap-number-input.js') }}"></script>
<script src="{{ asset('admin-assets/js/price-format.js') }}"></script>
<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
<script>
        CKEDITOR.replace( 'product-desc');
</script>

@endsection
