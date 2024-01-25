@extends('admin.layouts.auth.master')

@section('title' , __('auth.login'))


@section('content')
<section class="login-container w-100 bg-white d-flex flex-column justify-content-center align-items-center">
    <section class="login-wrapper position-relative">
        <section class="row">
            <section class="col-12">
                <section class="login-logo mb-2">
                    <img src="{{ hasFileUpload('admin-assets/images/logo.png') }}" class="rounded bg-gray p-2" alt="logo">
                </section>
            </section>

            <form method="POST" action="{{route('admin.auth.login')}}">
                <section class="col-12">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="email">@lang('auth.email')</label>
                        <input type="email" name="email" class="form-control form-control-sm mt-1" id="email" @error('email') data-error="error" @enderror @if(session('wrongCredentials')) data-error="error" @endif value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="@lang('auth.enter your email')" autofocus>
                        @error('email')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                        @if(session('wrongCredentials'))
                        <span class="text-danger font-size-12">
                            <strong>
                                @lang('auth.user or password was wrong')
                            </strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">@lang('auth.password')</label>
                        <input type="password" name="password" class="form-control form-control-sm  mt-1" id="password" @error('password') data-error="error" @enderror placeholder="@lang('auth.enter your password')" autocomplete="current-password">
                        @error('password')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                        <label class="form-check-label" for="remember"><small>@lang('auth.remember me')</small></label>
                    </div>
                </section>
                <div class="form-check d-flex justify-content-center mb-1">
                    <a href="{{route('admin.auth.password.forget.form')}}" class="text-secondary-700 text-decoration-none"><small>@lang('auth.forget your password?')</small></a>
                </div>

                <section class="col-12">
                    <section class="login-btn">
                        <button type="submit" class="btn btn-primary  w-100">ورود</button>
                    </section>
                </section>
            </form>
            <section class="my-2 text-center">
                <hr>
                <span class="bg-white position-absolute px-2 d-inline-block" style="margin-top: -1.7rem;margin-right: -12px;"><strong>یا</strong></span>
            </section>
            <section class="col-12 text-center">
                <a href="{{ route('admin.auth.login.provider.redirect', 'google')}}" class="login-with-google-btn text-decoration-none">
                    ورود توسط گوگل
                </a>
            </section>
        </section>
    </section>
</section>

<section class="position-absolute w-100 bg-gray copy-right" style="bottom: 0;">
    <p class="text-center m-0 py-1"><sub> © کلیه حقوق این پنل ادمین متعلق به <a href="https://bz4dev.w3spaces.com/" class="text-info text-decoration-none">صاحب اثر</a> می باشد. <span class="badge bg-success px-2 py-1 rounded">نسخه 1.0</span></sub></p>
</section>
@endsection