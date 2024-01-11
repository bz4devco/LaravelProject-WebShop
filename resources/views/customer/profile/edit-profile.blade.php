@extends('customer.layouts.master-two-col')

@section('haed-tag')
<title></title>
@endsection

@section('content')
<section class="content-wrapper bg-white p-3 rounded-2 mb-2">

    <!-- start vontent header -->
    <section class="content-header mb-4">
        <section class="d-flex justify-content-between align-items-center">
            <h2 class="content-header-title">
                <span>ویرایش اطلاعات حساب</span>
            </h2>
        </section>
    </section>
    <!-- end vontent header -->

    <form action="{{ route('customer.profile.update-profile', $user) }}" method="post">
        @csrf
        @method('PUT')
        <section class="row">

            <section class="col-12">
            @include('customer.alerts.alert-section.error')
            </section>

            <section class="col-md-6 mb-3">
                <label for="first_name" class="form-label mb-1">نام</label>
                <input type="text" class="form-control " id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}">
                @error('first_name')
                <span class="text-danger font-size-12">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
                @enderror
            </section>

            <section class="col-md-6 mb-3">
                <label for="last_name" class="form-label mb-1">نام خانوادگی</label>
                <input type="text" class="form-control " id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}">
                @error('last_name')
                <span class="text-danger font-size-12">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
                @enderror
            </section>
            
            @if(!isset(auth()->user()->mobile))
            <section class="col-md-6 mb-3">
                <label for="mobile" class="form-label mb-1">شماره موبایل</label>
                <section class="input-group">
                    <input type="text" style="direction: ltr;" class="form-control  text-end" name="mobile" id="mobile" value="{{ old('mobile', substr($user->mobile, 1)) }}" placeholder="(9××) ××× ××××">
                    <span class="input-group-text" id="deliver-price">+98</span>
                </section>
                @error('mobile')
                <span class="text-danger font-size-12">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
                @enderror
            </section>
            @endif

            @if(!isset(auth()->user()->email))
            <section class="col-md-6 mb-3">
                <label for="email" class="form-label mb-1">ایمیل</label>
                <input type="email" class="form-control " id="email" name="email" value="{{ old('email', $user->email) }}">
                @error('email')
                <span class="text-danger font-size-12">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
                @enderror
            </section>
            @endif

            <section class="col-md-6 mb-3">
                <label for="national_code" class="form-label mb-1">کدملی</label>
                <input type="text" class="form-control " id="national_code" name="national_code" value="{{ old('national_code', $user->national_code) }}">
                @error('national_code')
                <span class="text-danger font-size-12">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
                @enderror
            </section>
        </section>
        <section class="modal-footer  pt-3 mt-3">
            <button type="submit" class="btn btn-sm btn-primary">ثبت ویرایش</button>
        </section>
    </form>
</section>
@endsection
@section('script')
<script src="{{ asset('customer-assets/js/forms/mask-input/jquery.inputmask.js') }}"></script>
<script src="{{ asset('customer-assets/js/forms/price-format.js') }}"></script>
<script>
    $("#national_code").inputmask("mask", {
        "mask": "9999999999"
    });
    $("#mobile").inputmask("mask", {
        "mask": "(999) 999-9999"
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