@extends('admin.layouts.master')

@section('haed-tag')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/persian-datepicker/persian-datepicker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/persian-datepicker/persian-datepicker-cheerup.min.css') }}">

<title> ویرایش اطلاعیه ایمیلی  | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">اطلاع رسانی</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.notify.email.index') }}">اطلاعیه ایمیلی</a></li>
    <li class="breadcrumb-item active" aria-current="page">ویرایش اطلاعیه ایمیلی</li>
    <li class="breadcrumb-item active" aria-current="page">{{$email->title}}</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                ویرایش اطلاعیه ایمیلی
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.notify.email.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
            <form id="form" action="{{ route('admin.notify.email.update', $email->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="subject">عنوان ایمیل</label>
                                <input class="form-control form-select-sm" type="text" name="subject" id="subject" value="{{ old('subject' , $email->subject) }}">
                                @error('subject')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="startdate">تاریخ انتشار</label>
                                <input type="text" name="published_at" id="startdate_altField" class="form-control form-control-sm d-none" autocomplete="off" value="{{ old('published_at' , $email->published_at) }}"/>
                                <input type="text" id="startdate" class="form-control form-control-sm" autocomplete="off" value="{{ old('published_at' , $email->published_at) }}"/>
                                @error('published_at')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="status">وضعیت</label>
                                <select class="form-select form-select-sm" name="status" id="status">
                                    <option value="0" @selected(old('status', $email->status) == 0) >غیر فعال</option>
                                    <option value="1" @selected(old('status', $email->status) == 1) >فعال</option>
                                </select>
                                @error('status')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </section>
                        <section class="col-12 mb-3">
                            <div class="form-group">
                                <label for="body">متن ایمیل</label>
                                <textarea class="form-control form-control-sm" id="body" name="body" rows="5">{{ old('body' , $email->body) }}</textarea>
                                @error('body')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
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
<script type="text/javascript" src="{{ asset('admin-assets/js/persian-datepicker/persian_fromtodatepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/js/persian-datepicker/persian-date.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/js/persian-datepicker/persian-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/js/mask-input/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/datepicker-config.js') }}"></script>
<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
<script>
        CKEDITOR.replace( 'body');
</script>
<script>
    let publishedAtTime = new persianDate(parseInt($('#startdate_altField').val())).format("YYYY/MM/DD hh:mm:ss");
    $('#startdate').val(publishedAtTime);

</script>
@endsection