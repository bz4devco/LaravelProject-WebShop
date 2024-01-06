@extends('customer.layouts.master-one-col')

@section('haed-tag')
<link rel="stylesheet" href="{{ asset('customer-assets/css/address.css') }}">

<title></title>
@endsection

@section('content')
<!-- start cart -->
<section class="mb-4">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <!-- start vontent header -->
                <section class="content-header">
                    <section class="d-flex justify-content-between align-items-center">
                        <h2 class="content-header-title">
                            <span>تکمیل اطلاعات حساب کاربری</span>
                        </h2>
                    </section>
                </section>

                <section class="row mt-4">
                    <section class="col-md-9 mb-3">
                        <section class="content-wrapper bg-white p-3 rounded-2">

                            <form id="profile-completion" action="{{ route('customer.sales-process.profile-completion-update') }}" method="post">
                                @csrf
                                <section class="address-alert alert alert-primary d-flex align-items-center p-2" role="alert">
                                    <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                    <secrion>
                                        اطلاعات حساب کاربری خود را (فقط یک بار برای همیشه) وارد کنید، از ین پس کالاها برای شخصی با این مشخصت ارسال می شود.
                                    </secrion>
                                </section>
                                @include('customer.alerts.alert-section.error')
                                <section class="row pb-3">
                                    <section class="col-12 col-md-6 my-2">
                                        <div class="form-group">
                                            <lable for="first_name">نام</lable>
                                            @if(empty($user->first_name))
                                            <input type="text" class="form-control form-control-sm" name="first_name" id="first_name" value="{{ old('first_name') }}" autofocus>
                                            @error('first_name')
                                            <span class="text-danger font-size-12">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                            @enderror
                                            @else
                                            <p class="mt-1">{{$user->first_name}}</p>
                                            @endif
                                        </div>
                                    </section>

                                    <section class="col-12 col-md-6 my-2">
                                        <div class="form-group">
                                            <lable for="last_name">نام خانوادگی</lable>
                                            @if(empty($user->last_name))
                                            <input type="text" class="form-control form-control-sm" name="last_name" id="last_name" value="{{ old('last_name') }}" autofocus>
                                            @error('last_name')
                                            <span class="text-danger font-size-12">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                            @enderror
                                            @else
                                            <p class="mt-1">{{$user->last_name}}</p>
                                            @endif
                                        </div>
                                    </section>

                                    <section class="col-12 col-md-6 my-2">
                                        <div class="form-group">
                                            <lable for="mobile">موبایل</lable>
                                            @if(empty($user->mobile))
                                            <section class="input-group input-group-sm">
                                            <input type="text" style="direction: ltr;" class="form-control form-control-sm text-end" name="mobile" id="mobile" value="{{ old('mobile') }}" placeholder="(9××) ××× ××××" autofocus>
                                            <span class="input-group-text" id="deliver-price">+98</span>
                                            </section>
                                            @error('mobile')
                                            <span class="text-danger font-size-12">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                            @enderror
                                            @else
                                            <p class="mt-1">{{$user->mobile}}</p>
                                            @endif
                                        </div>
                                    </section>

                                    <section class="col-12 col-md-6 my-2">
                                        <div class="form-group">
                                            <lable for="email">ایمیل</lable>
                                            @if(empty($user->email))
                                            <input type="text" class="form-control form-control-sm" name="email" id="email" value="{{ old('email') }}" autofocus>
                                            @error('email')
                                            <span class="text-danger font-size-12">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                            @enderror
                                            @else
                                            <p class="mt-1">{{$user->email}}</p>
                                            @endif
                                        </div>
                                    </section>

                                    <section class="col-12 col-md-6 my-2">
                                        <div class="form-group">
                                            <lable for="national_code">کد ملی</lable>
                                            @if(empty($user->national_code))
                                            <input type="text" class="form-control form-control-sm" name="national_code" id="national_code" value="{{ old('national_code') }}" autofocus>
                                            @error('national_code')
                                            <span class="text-danger font-size-12">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                            @enderror
                                            @else
                                            <p class="mt-1">{{$user->national_code}}</p>
                                            @endif
                                        </div>
                                    </section>
                                </section>
                            </form>
                        </section>
                    </section>
                    <section class="col-md-3">
                        <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                            @php
                            $totalProductPrice = 0;
                            $totalDiscount = 0;
                            @endphp
                            @foreach ($cartItems as $cartItem)
                            @php
                            $totalProductPrice += $cartItem->cartItemProductPrice() * $cartItem->number;
                            $totalDiscount += $cartItem->cartItemProductDiscount() * $cartItem->number;
                            @endphp
                            @endforeach

                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">قیمت کالاها ({{$cartItems->count()}})</p>
                                <p class="text-muted" id="total-product-price">{{number_format($totalProductPrice)}} تومان</p>
                            </section>

                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">تخفیف کالاها</p>
                                <p class="text-danger fw-bolder" id="total-product-discount">{{number_format($totalDiscount)}} تومان</p>
                            </section>
                            <section class="border-bottom mb-3"></section>
                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">جمع سبد خرید</p>
                                <p class="fw-bolder" id="total-price">{{number_format($totalProductPrice - $totalDiscount)}} تومان</p>
                            </section>

                            <p class="my-3">
                                <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد.
                            </p>


                            <section class="">
                                <button onclick="document.getElementById('profile-completion').submit()" class="btn btn-danger d-block w-100">تکمیل فرآیند خرید</buttonref=>
                            </section>

                        </section>
                    </section>
                </section>
            </section>
        </section>

    </section>
</section>
<!-- end cart -->
@endsection
@section('script')

<script src="{{ asset('customer-assets/js/forms/mask-input/jquery.inputmask.js') }}"></script>
<script src="{{ asset('customer-assets/js/forms/mask-input/jquery.inputmask.numeric.extensions.js') }}"></script>
<script>
    $("#mobile").inputmask("mask", {
        "mask": "(999) 999-9999"
    });
    $("#national_code").inputmask("mask", {
        "mask": "9999999999"
    });

    if ($('.alert.alert-danger').length) {
        $('.alert.alert-danger').addClass('show').delay(5000).queue(function() {
            $(this).remove();
        });
    }
</script>
@include('customer.alerts.sweetalert.success')
@include('customer.alerts.sweetalert.error')
@endsection