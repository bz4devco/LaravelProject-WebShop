@extends('admin.layouts.master')

@section('haed-tag')
<title> ایجاد پرسش | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش محتوی</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.content.faq.index') }}">سولات متداول</a></li>
    <li class="breadcrumb-item active" aria-current="page">ایجاد پرسش</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                ایجاد پرسش
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.content.faq.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form action="" method="">
                    <section class="row">
                        <section class="col-12">
                            <div class="form-group mb-3">
                                <label for="">پرسش</label>
                                <input class="form-control form-select-sm" type="text">
                            </div>
                        </section>
                        <section class="col-12 mb-3">
                            <div class="form-group">
                                <label for="">توضیحات کالا</label>
                                <textarea id="product-desc"></textarea>
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
@section('script')
<script type="text/javascript" src="{{ asset('admin-assets/js/mask-input/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
<script>
        CKEDITOR.replace( 'product-desc');
</script>

@endsection