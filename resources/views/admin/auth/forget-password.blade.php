@extends('admin.layouts.auth.master')

@section('title' , __('auth.forgot password'))


@section('content')
<section class="login-container w-100 bg-white d-flex flex-column justify-content-center align-items-center">
    <section class="login-wrapper position-relative">
        <section>
            <a href="{{ route('admin.auth.login.form') }}" class="text-decoration-none text-dark back-to-login" data-bs-toggle="tooltip" data-bs-placement="top" title="بازگشت به فرم ورود"><i class="fas fa-arrow-right fa-lg"></i></a>
        </section>
        <section class="row">
            <section class="col-12">
                <section class="login-logo mb-4">
                    <img src="{{ hasFileUpload('admin-assets/images/logo.png') }}" class="rounded bg-gray p-2" alt="logo">
                </section>
            </section>

            <form method="POST" action="{{route('admin.auth.password.forget')}}">
                @csrf
                <section class="col-12 mb-4 text-center">
                    <strong>@lang('auth.forgot password')</strong>
                </section>

                <section class="col-12 my-1">
                    @if(session('resetLinkFailed'))
                    <div class="alert alert-danger alert-dismissible fade" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                        </svg>
                        <strong class="alert-heading ">خطا در علیات</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <hr class="my-2">
                        <p class="mb-0">
                            @lang('auth.reset link failed')
                        </p>
                    </div>
                    @endif
                    @if (session('resetLinkSend'))
                    <div class="alert alert-success alert-dismissible fade" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                        <strong class="alert-heading ">عملیات موفقیت آمیز</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <hr class="my-2">
                        <p class="mb-0">
                            @lang('auth.reset link sent')
                        </p>
                    </div>
                    @endif
                </section>

                <section class="col-12">
                    <div class="form-group mb-3">
                        <label class="form-check-label" for="email">@lang('auth.email')</label>
                        <input type="email" name="email" class="form-control form-control-sm  mt-1" id="email" @error('email') data-error="error" @enderror @if(session('wrongUserEmail')) data-error="error" @endif value="{{old('email')}}" aria-describedby="emailHelp" placeholder="@lang('auth.enter your email')">
                        @error('email')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                        @if(session('wrongUserEmail'))
                        <span class="text-danger font-size-12">
                            <strong>
                                @lang('auth.email was wrong')
                            </strong>
                        </span>
                        @enderror
                    </div>
                    <section class="col-12">
                        <section class="login-btn">
                            <button type="submit" class="btn btn-primary  w-100">@lang('auth.request reset password')</button>
                        </section>
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