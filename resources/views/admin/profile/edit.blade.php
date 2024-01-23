@extends('admin.layouts.master')

@section('haed-tag')
<title> ویرایش پروفایل | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">پروفایل</a></li>
        <li class="breadcrumb-item active" aria-current="page">ویرایش پروفایل </li>
        <li class="breadcrumb-item active" aria-current="page">{{ $user->full_name ?? ($user->email ?? $user->mobile)}} </li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    ویرایش پروفایل
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.profile.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form id="form" action="{{ route('admin.profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <section class="row">
                        <section class="col-12">
                            <div class="form-group mb-3">
                                <div class="d-flex justify-content-center">
                                    <label for="avatar-profile" class="form-label attachment-ticket-lable">
                                        <section class="d-flex justify-content-center">
                                            <img src="{{ hasFileUpload($user->profile_photo_path , 'avatar') }}" class="shadow mb-1" style="border-radius: 0.6rem;cursor: pointer;" height="100" alt="avatar">
                                        </section>
                                        <small class="d-block text-center mb-4"><a class="text-decoration-none">تغییر تصویر پروفایل</a></small>
                                        <h5><strong class="d-block text-center mb-2">مقام:</strong></h5>
                                        @php $userRole = $user->roles ? $user->roles()->first() : null; @endphp
                                        <h6 class="d-flex justify-content-center">
                                            @if($userRole && ($userRole->name == 'super-admin' || $userRole->name == 'admin'))
                                            <i class="fa fa-star ms-2 text-warning"></i>
                                            @endif
                                            <strong class="d-block text-center text-warning">{{ $userRole->title ?? 'نا مشخص' }}</strong>
                                            @if($userRole && ($userRole->name == 'super-admin' || $userRole->name == 'admin'))
                                            <i class="fa fa-star me-2 text-warning"></i>
                                            @endif
                                        </h6>
                                    </label>
                                    <input class="form-control d-none" type="file" id="avatar-profile" name="avatar">
                                </div>
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="first_name">نام</label>
                                <input class="form-control form-select-sm" type="text" name="first_name" id="first_name" value="{{old('first_name', $user->first_name)}}">
                                @error('first_name')
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
                                <label for="last_name">نام خانوادگی</label>
                                <input class="form-control form-select-sm" type="text" name="last_name" id="last_name" value="{{old('last_name', $user->last_name)}}">
                                @error('last_name')
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
<script src="{{ asset('admin-assets/js/plugin/form/price-format.js') }}"></script>
@endsection