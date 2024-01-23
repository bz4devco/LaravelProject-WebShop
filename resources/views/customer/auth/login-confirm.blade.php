@extends('customer.layouts.master-simple')


@section('haed-tag')
<link rel="stylesheet" href="{{ asset('customer-assets/css/login.css') }}">

<title>تایید احراز هویت | {{ $setting->title }} </title>
@endsection
@section('content')

<section class="login-container w-100 bg-white d-flex flex-column justify-content-center align-items-center">
    <form action="{{ route('auth.customer.login-confirm', $token) }}" method="post">
        @csrf
        <section class="login-wrapper position-relative">
            <section>
                <a href="{{ route('auth.customer.login-register-form') }}" class="text-decoration-none text-dark back-to-login" data-bs-toggle="tooltip" data-bs-placement="top" title="بازگشت به فرم ورود"><i class="fas fa-arrow-right fa-lg"></i></a>
            </section>
            <section class="row">
                <section class="col-12">
                    <section class="login-logo mb-3">
                        <a class="text-decoration-none" href="{{route('customer.home')}}">
                            <img src="{{ hasFileUpload($setting->logo, 'logo') }}" alt="logo">
                        </a>
                    </section>
                </section>
                <section class="col-12">
                    <section class="login-title font-1-bold mb-4">کد تایید را وارد کنید</section>
                    <section class="login-info">
                        @if($user_login_id->type == 0)
                        <span>کد تایید برای شماره {{$user_login_id->login_id}} پیامک شد
                        </span>
                        @else
                        <span>کد تایید به ایمیل {{$user_login_id->login_id}} ارسال گردید
                        </span>
                        @endif
                    </section>
                </section>
                <section class="col-12">
                    <section class="login-input-text position-relative mb-4">
                        <input class="text-center confirm-input number" type="text" name="otp" id="otp" @error('otp') data-error="error" @enderror @if($errors->first()) data-error="error" @endif
                        @enderrorvalue="{{ old('otp') }}" autofocus required autocomplete="of">
                        @error('otp')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                        @foreach ($errors->all() as $error)
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $error }}
                            </strong>
                        </span>
                        @endforeach
                    </section>
                </section>
                <section class="col-12">
                    <section class="login-input-text position-relative mb-4">
                        <p id="resend-code" data-url="{{ route('auth.customer.login-resend-code', $token) }}" class="text-center"></p>
                    </section>
                </section>
                <section class="col-12">
                    <section class="login-btn mb-3">
                        <button type="submit" class="btn btn-danger w-100">تایید</button>
                    </section>
                </section>
            </section>
        </section>
    </form>
</section>
@endsection
@section('script')
<script src="{{ asset('customer-assets/js/forms/mask-input/jquery.inputmask.js') }}"></script>
<script src="{{ asset('customer-assets/js/forms/mask-input/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('customer-assets/js/forms/mask-input/jquery.inputmask.numeric.extensions.js') }}"></script>
<script src="{{ asset('customer-assets/js/ajax/login-resend-code-ajax.js') }}"></script>
<script src="{{ asset('customer-assets/js/forms/resend-code-timer.js') }}"></script>
<script>
    $("#otp").inputmask("mask", {
        "mask": "999999"
    });

    if ($('.alert.alert-danger').length) {
        $('.alert.alert-danger').addClass('show').delay(5000).queue(function() {
            $(this).remove();
        });
    }
</script>
@endsection