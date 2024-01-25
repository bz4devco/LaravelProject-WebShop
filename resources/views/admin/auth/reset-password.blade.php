@extends('admin.layouts.auth.master')

@section('title' , __('auth.reset password'))


@section('content')
<section class="login-container w-100 bg-white d-flex flex-column justify-content-center align-items-center">
    <section class="login-wrapper position-relative">
        <section>
            <a href="{{ route('admin.auth.login.form') }}" class="text-decoration-none text-dark back-to-login" data-bs-toggle="tooltip" data-bs-placement="top" title="بازگشت به فرم ورود"><i class="fas fa-arrow-right fa-lg"></i></a>
        </section>
        <section class="row">
            <section class="col-12">
                <section class="login-logo mb-2">
                    <img src="{{ hasFileUpload('admin-assets/images/logo.png') }}" class="rounded bg-gray p-2" alt="logo">
                </section>
            </section>

            <form method="POST" action="{{route('admin.auth.password.reset')}}">
                @csrf
                
                <section class="col-12 mb-4 text-center">
                    <strong>@lang('auth.reset password')</strong>
                </section>

                <section class="col-12 my-1">
                    @if(session('cantChangePassword'))
                    <div class="alert alert-danger alert-dismissible fade" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                        </svg>
                        <strong class="alert-heading ">خطا در علیات</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <hr class="my-2">
                        <p class="mb-0">
                            @lang('auth.cantChangePassword')
                        </p>
                    </div>
                    @endif
                </section>

                <section class="col-12">
                    <input type="hidden" name="token" value="{{$token}}">
                    <div class="form-group mt-2">
                        <label for="email">@lang('auth.email')</label>
                        <input type="email" name="email" class="form-control form-control-sm  mt-1" id="email" readonly value="{{$email}}" aria-describedby="emailHelp" placeholder="@lang('auth.enter your email')">
                    </div>
                    <div class="form-group mt-2">
                        <label for="password">@lang('auth.password')</label>
                        <input type="password" name="password" class="form-control form-control-sm  mt-1" id="password" placeholder="@lang('auth.enter your password')">
                        @error('password')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="password_confirmation">@lang('auth.confirm password')</label>
                        <input type="password" name="password_confirmation" class="form-control form-control-sm  mt-1" id="password_confirmation" placeholder="@lang('auth.confirm your password')">
                        @error('password_confirmation')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </div>
                </section>
                <section class="col-12 mt-4">
                    <section class="login-btn">
                        <button type="submit" class="btn btn-primary w-100">@lang('auth.reset password')</button>
                    </section>
                </section>
            </form>
        </section>
    </section>
</section>

<section class="position-absolute w-100 bg-gray copy-right" style="bottom: 0;">
    <p class="text-center m-0 py-1"><sub> © کلیه حقوق این پنل ادمین متعلق به <a href="https://bz4dev.w3spaces.com/" class="text-info text-decoration-none">صاحب اثر</a> می باشد. <span class="badge bg-success px-2 py-1 rounded">نسخه 1.0</span></sub></p>
</section>
@endsection