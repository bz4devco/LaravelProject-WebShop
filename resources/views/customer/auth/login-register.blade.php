@extends('customer.layouts.master-simple')


@section('haed-tag')
<link rel="stylesheet" href="{{ asset('customer-assets/css/login.css') }}">

<title>ورود / ثبت نام | {{ $setting->title }} </title>
@endsection

@section('content')
<section class="login-container w-100 bg-white d-flex flex-column justify-content-center align-items-center">
    <form action="{{ route('auth.customer.login-register') }}" method="post">
        @csrf
        <section class="login-wrapper position-relative">
            <section class="choose-login-method position-absolute">
                <ul class="nav nav-tabs d-flex justify-content-center border-0" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link  border-bottom-0 active" id="login-mobile-tab" data-bs-toggle="tab" type="button" role="tab" aria-controls="mobile" aria-selected="true">ورود با موبایل</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link  border-bottom-0" id="login-email-tab" data-bs-toggle="tab" type="button" role="tab" aria-controls="email" aria-selected="true">ورود با ایمیل</button>
                    </li>
                </ul>
            </section>
            <section class="row">
                <section class="col-12">
                    <section class="login-logo mb-3">
                        <a class="text-decoration-none" href="{{route('customer.home')}}">
                            <img src="{{ hasFileUpload($setting->logo, 'logo') }}" alt="logo">
                        </a>
                    </section>
                </section>
                @include('customer.alerts.alert-section.error')
                <section class="col-12">
                    <section class="login-title font-1-bold mb-4">ورود | ثبت نام</section>
                    <section class="login-info">سلام!</section>
                    <section id="login-input-lable" class="login-info">
                        <span>لطفا شماره موبایل خود را وارد کنید
                        </span>
                    </section>
                </section>
                <section class="col-12">
                    <section id="change-input" class="login-input-text mobile position-relative mb-4">
                    </section>
                </section>
                <section class="col-12">
                    <section class="login-btn mb-3">
                        <button type="submit" class="btn btn-danger w-100">ورود به حساب کاربری </button>
                    </section>
                </section>
                <section class="col-12">
                    <p class="text-caption text-neutral-700">
                        ورود شما به معنای پذیرش
                        <a class="mx-1  text-secondary-700" href="">شرایط دیجی&zwnj;کالا</a>
                        و
                        <a class="mx-1 inline-block text-secondary-700" href="">قوانین حریم&zwnj;خصوصی</a>است
                    </p>
                </section>
            </section>
        </section>
    </form>
</section>
@endsection
@section('script')
<script>
    let isEmail = "{{ old('email')}}",
        isMobile = "{{ old('mobile') }}";

    let mobileError =
        `@error('mobile')
        <span class="text-danger font-size-12">
            <strong>
                {{ $message }}
            </strong>
        </span>
    @enderror`,

        emailError =
        `@error('email')
        <span class="text-danger font-size-12">
            <strong>
                {{ $message }}
            </strong>
        </span>
    @enderror`;
</script>
<script src="{{ asset('customer-assets/js/pages/login.js') }}"></script>
<script src="{{ asset('customer-assets/js/forms/mask-input/jquery.inputmask.js') }}"></script>
<script src="{{ asset('customer-assets/js/forms/mask-input/jquery.inputmask.numeric.extensions.js') }}"></script>
<script>
    // when on loaded page
    $(document).ready(function() {

        if (isEmail != "") {
            emailShow();
        } else if (isMobile != "") {
            mobileShow();
            $("#mobile").inputmask("mask", {
                "mask": "(999) 999-9999"
            });
        } else {
            mobileShow();
            $("#mobile").inputmask("mask", {
                "mask": "(999) 999-9999"
            });
        }
    });

    // when on change tabs
    $("#login-email-tab").on("click", function() {
        emailShow();
    });
    $("#login-mobile-tab").on("click", function() {
        mobileShow();
        $("#mobile").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
    });


    if ($('.alert.alert-danger').length) {
        $('.alert.alert-danger').addClass('show').delay(5000).queue(function() {
            $(this).remove();
        });
    }
</script>
@endsection