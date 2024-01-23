@extends('admin.layouts.master')

@section('haed-tag')
<title> پروفایل | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">پروفایل</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ auth()->user()->full_name ?? (auth()->user()->email ?? auth()->user()->mobile)}} </li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    پروفایل
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.profile.edit', auth()->user()) }}" class="btn btn-sm btn-info text-white">ویرایش پروفایل</a>
            </section>
            @include('admin.alerts.alert-section.success')
            <section class="">
                <section class="row">
                    <section class="col-12">
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-center">
                                <section>
                                    <section class="d-flex justify-content-center">
                                        <img src="{{ hasFileUpload(auth()->user()->profile_photo_path , 'avatar') }}" class="shadow mb-4" style="border-radius: 0.6rem;" height="100" alt="avatar">
                                    </section>
                                    <h5><strong class="d-block text-center mb-2">مقام:</strong></h5>
                                    @php $userRole = auth()->user()->roles ? auth()->user()->roles()->first() : null; @endphp
                                    <h6 class="d-flex justify-content-center">
                                        @if($userRole && ($userRole->name == 'super-admin' || $userRole->name == 'admin'))
                                        <i class="fa fa-star ms-2 text-warning"></i>
                                        @endif
                                        <strong class="d-block text-center text-warning">{{ $userRole->title ?? 'نا مشخص' }}</strong>
                                        @if($userRole && ($userRole->name == 'super-admin' || $userRole->name == 'admin'))
                                        <i class="fa fa-star me-2 text-warning"></i>
                                        @endif
                                    </h6>
                                </section>
                            </div>
                        </div>
                    </section>
                    <section class="col-12">
                        <section class="row justify-content-around">
                            <section class="col-12 col-md-6 my-3">
                                <div class="form-group d-flex justify-content-center">
                                    <h6><strong>نام: </strong></h6>
                                    <h6><span class="me-3 d-inline-block">{{ auth()->user()->first_name ?? ' - ' }}</span></h6>
                                </div>
                            </section>
                            <section class="col-12 col-md-6 my-3">
                                <div class="form-group d-flex justify-content-center">
                                    <h6><strong>نام خانوادگی: </strong></h6>
                                    <h6><span class="me-3 d-inline-block">{{ auth()->user()->last_name ?? ' - ' }}</span></h6>
                                </div>
                            </section>
                            <section class="col-12 col-md-6 my-3">
                                <div class="form-group d-flex justify-content-center">
                                    <h6><strong>موبایل: </strong></h6>
                                    <h6>
                                        <span class="me-3 d-inline-block">{{ auth()->user()->mobile ?? ' - ' }}</span>
                                        @isset(auth()->user()->mobile)
                                        @php
                                        $mobile_verified['style'] = auth()->user()->mobile_verified_at ? 'bg-success' : 'bg-danger';
                                        $mobile_verified['title'] = auth()->user()->mobile_verified_at ? 'فعال سازی شده' : 'فعال سازی نشده';
                                        @endphp
                                        <br>
                                        <span class="me-3 d-inline-block badge {{ $mobile_verified['style'] }}">{{ $mobile_verified['title'] }}</span>
                                        @endisset
                                    </h6>
                                </div>
                            </section>
                            <section class="col-12 col-md-6 my-3">
                                <div class="form-group d-flex justify-content-center">
                                    <h6><strong>ایمیل: </strong></h6>
                                    <h6><span class="me-3 d-inline-block">{{ auth()->user()->email ?? ' - ' }}</span>
                                        @isset(auth()->user()->email)
                                        @php
                                        $email_verified['style'] = auth()->user()->email_verified_at ? 'bg-success' : 'bg-danger';
                                        $email_verified['title'] = auth()->user()->email_verified_at ? 'فعال سازی شده' : 'فعال سازی نشده';
                                        @endphp
                                        <br>
                                        <span class="me-3 d-inline-block badge {{ $email_verified['style'] }}">{{ $email_verified['title'] }}</span>
                                        @endisset
                                    </h6>
                                </div>
                            </section>
                            <section class="col-12 col-md-6 my-3">
                                <div class="form-group d-flex justify-content-center">
                                    <h6><strong>کد ملی: </strong></h6>
                                    <h6><span class="me-3 d-inline-block">{{ auth()->user()->national_code ?? ' - ' }}</span></h6>
                                </div>
                            </section>
                            <section class="col-12 col-md-6 my-3">
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection
@section('script')
<script src="{{ asset('admin-assets/js/plugin/form/price-format.js') }}"></script>
@endsection