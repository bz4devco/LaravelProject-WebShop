@extends('admin.layouts.master')

@section('haed-tag')
<title> ویرایش تنظیمات | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.setting.index') }}">تنظیمات</a></li>
    <li class="breadcrumb-item active" aria-current="page">ویرایش تنظیمات</li>
    <li class="breadcrumb-item active" aria-current="page">{{$setting->title}}</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                ویرایش تنظیمات 
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.setting.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form id="form" action="{{ route('admin.setting.update', $setting->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="title">نام سایت</label>
                                <input class="form-control form-select-sm" type="text" id="title" name="title" value="{{ old('title' , $setting->title) }}">
                                @error('title')
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
                                <label for="base_url">آدرس Url سایت</label>
                                <input class="form-control form-select-sm" type="url" id="base_url" name="base_url" value="{{ old('base_url' , $setting->base_url) }}" placeholder="https://example.com">
                                @error('base_url')
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
                                <label for="logo">لوگو سایت</label>
                                <input class="form-control form-select-sm" type="file" name="logo" id="logo"  accept="image/*">
                                @error('logo')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                                @if($setting->logo != null)
                                <section class="row">
                                    <section class="col-md-6 mt-2">
                                        <img src="{{asset($setting->logo)}}" class="rounded-3" width="100" alt="logo">
                                    </section>
                                </section>
                                @endif
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="icon">آیکون سایت</label>
                                <input class="form-control form-select-sm" type="file" name="icon" id="icon"  accept="image/*">
                                @error('icon')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                                @if($setting->icon != null)
                                <section class="row">
                                    <section class="col-md-6 mt-2">
                                        <img src="{{asset($setting->icon)}}" class="rounded-3" width="100" alt="icon">
                                    </section>
                                </section>
                                @endif
                            </div>
                        </section>
                        <section class="col-12">
                            <div class="form-group mb-3">
                                <label for="">توضیحات سایت</label>
                                <textarea class="form-control form-select-sm" id="description" name="description">{{ old('description' , $setting->description) }}</textarea>
                                @error('description')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </section>
                        <section class="col-12">
                            <div class="form-group mb-3">
                                <label for="tags">کلمات کلیدی</label>
                                <input class="form-control form-select-sm d-none" type="text" name="keywords" id="tags" value="{{ old('keywords', $setting->keywords) }}">
                                <select name="" id="select_tags" class="select2 form-control-sm form-control" multiple></select>
                                @error('keywords')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </section>
                        <section class="col-12">
                            <fieldset class="reset d-block mb-3">
                                <legend class="reset"><strong>راه های ارتباطی</strong></legend>
                                <section class="row">
                                    <section class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="tel">تلفن</label>
                                            <input class="form-control form-select-sm" type="text" id="tel" name="tel" value="{{ old('tel' , $setting->tel) }}">
                                            @error('tel')
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
                                            <label for="title">ایمیل</label>
                                            <input class="form-control form-select-sm" type="email" id="email" name="email" value="{{ old('email' , $setting->email) }}">
                                            @error('email')
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
                                            <label for="address">آدرس</label>
                                            <input class="form-control form-select-sm" type="text" id="address" name="address" value="{{ old('address' , $setting->address) }}">
                                            @error('address')
                                                <span class="text-danger font-size-12">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </section>
                                </section>
                            </fieldset>
                        </section>
                        <section class="col-12">
                            <fieldset class="reset d-block mb-3">
                                <legend class="reset"><strong>شبکه های اجتماعی</strong></legend>
                                <section class="row">
                                    <section class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="tel">تلگرم</label>
                                            <input class="form-control form-select-sm" type="url" id="telegram" name="telegram" value="{{ old('telegram' , $setting->telegram) }}">
                                            @error('telegram')
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
                                            <label for="instagram">اینستاگرام</label>
                                            <input class="form-control form-select-sm" type="instagram" id="instagram" name="instagram" value="{{ old('instagram' , $setting->instagram) }}">
                                            @error('instagram')
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
                                            <label for="twitter">توئیتر</label>
                                            <input class="form-control form-select-sm" type="url" id="twitter" name="twitter" value="{{ old('twitter' , $setting->twitter) }}">
                                            @error('twitter')
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
                                            <label for="linkedin">لینکدین</label>
                                            <input class="form-control form-select-sm" type="url" id="linkedin" name="linkedin" value="{{ old('linkedin' , $setting->linkedin) }}">
                                            @error('linkedin')
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
                                            <label for="google_plus">گوگل پلاس</label>
                                            <input class="form-control form-select-sm" type="url" id="google_plus" name="google_plus" value="{{ old('google_plus' , $setting->google_plus) }}">
                                            @error('google_plus')
                                                <span class="text-danger font-size-12">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </section>
                                </section>
                            </fieldset>
                        </section>
                        <section class="col-12">
                            <div class="form-group mb-3">
                                <label for="google_map">نقشه گوگل</label>
                                <textarea class="form-control form-select-sm" id="google_map" name="google_map" rows="3">{{ old('google_map' , $setting->google_map) }}</textarea>
                                @error('google_map')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </section>
                        <div class="form-group mb-3">
                                <label for="status">وضعیت</label>
                                <select class="form-select form-select-sm" name="status" id="status">
                                    <option value="0" @selected(old('status', $setting->status) == 0) >غیر فعال</option>
                                    <option value="1" @selected(old('status', $setting->status) == 1) >فعال</option>
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
<!-- category page category list area -->
@endsection
@section('script')
<script src="{{ asset('admin-assets/js/plugin/form/select2-input-config.js') }}"></script>
<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
<script>
        CKEDITOR.replace('description');
</script>
@endsection