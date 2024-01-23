@extends('admin.layouts.master')

@section('haed-tag')
<title> ایجاد شهرستان | پنل مدیریت</title>
@endsection

@section('content')
<!-- province page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">تنظیمات</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.setting.province.index', $province->id) }}">استان ها</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $province->name }}</li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.setting.province.index', $province->id) }}">شهرستان ها</a></li>
    <li class="breadcrumb-item active" aria-current="page">ایجاد شهرستان</li>
</ol>
</nav>
<!-- province page Breadcrumb area -->
<!--province page province list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 ایجاد شهرستان برای استان ({{$province->name}})
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.setting.province.index', $province->id) }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form action="{{ route('admin.setting.city.store', $province->id) }}" method="post">
                    @csrf
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">نام شهرستان</label>
                                <input class="form-control form-select-sm" type="text" name="name" id="name" value="{{ old('name') }}">
                                @error('name')
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
                                <label for="status">وضعیت</label>
                                <select class="form-select form-select-sm" name="status" id="status">
                                    <option value="0" @selected(old('status') == 0) >غیر فعال</option>
                                    <option value="1" @selected(old('status') == 1) >فعال</option>
                                </select>
                                @error('status')
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
<!-- province page province list area -->
@endsection
