@extends('admin.layouts.master')

@section('haed-tag')
<title> ایجاد منو | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.content.menu.index') }}">منوها</a></li>
        <li class="breadcrumb-item active" aria-current="page">ایجاد منو</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    ایجاد منوی جدید
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.content.menu.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form id="form" action="{{ route('admin.content.menu.store') }}" method="post">
                    @csrf
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">عنوان منو</label>
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
                                <label for="url">آدرس URL</label>
                                <input class="form-control form-select-sm" type="url" name="url" id="url" placeholder="http://example.com" value="{{ old('url') }}">
                                @error('url')
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
                                <label for="position">مکان نمایش</label>
                                <select class="form-select form-select-sm" name="position" id="position">
                                    <option disabled selected>مکان نمایش را انتخاب کنید</option>
                                    @forelse($positions as $key => $position)
                                        <option value="{{$key}}"  @selected(old('position') == $key)>{{ $position }}</option>
                                    @empty
                                        <option disabled class="text-center">مکانی درج نشده است</option>
                                    @endforelse
                                </select>
                                @error('position')
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
                                <label for="parent_id">منو والد</label>
                                <select class="form-select form-select-sm" name="parent_id" id="parent_id">
                                    <option disabled selected>والد را انتخاب کنید</option>
                                    <option value="" @selected(old('parent_id')=='' )>منوی اصلی</option>
                                    @forelse($menus as $menu)
                                    <option value="{{$menu->id}}" @selected(old('parent_id')==$menu->id) >{{ $menu->name }}</option>
                                    @empty
                                    <option disabled class="text-center">والدی وجود ندارد</option>
                                    @endforelse
                                </select>
                                @error('parent_id')
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
                                    <option value="0" @selected(old('status')==0)>غیر فعال</option>
                                    <option value="1" @selected(old('status')==1)>فعال</option>
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
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="sort">ترتیب نمایش</label>
                                <div class="input-group  input-group-sm number-spinner">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-border p-btn-num rounded-end" data-dir="up">+</button>
                                    </span>
                                    <input name="sort" id="sort" class="input-step-number form-control number text-center rounded-0" data-char="" type="text" step="1" value="@if (old('sort')) {{old('sort')}} @else {{1}} @endif" min="0" max="">
                                    <span class="input-group-btn ">
                                        <button type="button" class="btn btn-default btn-border p-btn-num rounded-start" data-dir="dwn">-</button>
                                    </span>
                                </div>
                                @error('sort')
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
<script src="{{ asset('admin-assets/js/plugin/form/bootstrap-number-input.js') }}"></script>
@endsection