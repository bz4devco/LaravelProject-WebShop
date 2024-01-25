@extends('customer.layouts.master-two-col')

@section('haed-tag')
<meta name="robots" content="noindex, nofollow">

<title>پروفایل من | {{$setting->title}}</title>
@endsection

@section('content')
<section class="content-wrapper bg-white p-3 rounded-2 mb-2">

    <!-- start vontent header -->
    <section class="content-header mb-4">
        <section class="d-flex justify-content-between align-items-center">
            <h2 class="content-header-title">
                <span>اطلاعات حساب</span>
            </h2>
        </section>
    </section>
    <!-- end vontent header -->

    <section class="d-flex justify-content-end my-4">
        <a class="btn btn-link btn-sm text-info text-decoration-none mx-1" href="{{ route('customer.profile.edit-profile', $user) }}"><i class="fa fa-edit px-1"></i>ویرایش حساب</a>
    </section>


    <section class="row">
        @if($user->checkNotCompletionProfile())
        <section class="col-12">
            <section class="address-alert alert alert-primary d-flex align-items-center p-2" role="alert">
                <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                <secrion>
                   جهت تکمیل اطلاعت حساب کاربری خود اقدام نمایید. جهت تکمیل بر روی گزینه ویرایش حساب کلیک فرماید.
                </secrion>
            </section>
        </section>
        @endif
        <section class="col-6 border-bottom mb-2 py-2">
            <section class="field-title">نام</section>
            <section class="field-value overflow-auto">{{$user->first_name ?? '--'}}</section>
        </section>

        <section class="col-6 border-bottom my-2 py-2">
            <section class="field-title">نام خانوادگی</section>
            <section class="field-value overflow-auto">{{$user->last_name ?? '--'}}</section>
        </section>

        <section class="col-6 border-bottom my-2 py-2">
            <section class="field-title">شماره تلفن همراه</section>
            <section class="field-value overflow-auto">{{$user->mobile ?? '--'}}</section>
        </section>

        <section class="col-6 border-bottom my-2 py-2">
            <section class="field-title">ایمیل</section>
            <section class="field-value overflow-auto">{{$user->email ?? '--'}}</section>
        </section>

        <section class="col-6 my-2 py-2">
            <section class="field-title">کد ملی</section>
            <section class="field-value overflow-auto">{{$user->national_code ?? '--'}}</section>
        </section>
    </section>

</section>
@endsection
@section('script')

@include('customer.alerts.sweetalert.success')
@include('customer.alerts.sweetalert.error')

@endsection