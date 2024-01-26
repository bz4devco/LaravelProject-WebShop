@extends('admin.layouts.master')

@section('haed-tag')
<title> ویرایش دسته بندی | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.category.index') }}">دسته بندی</a></li>
    <li class="breadcrumb-item active" aria-current="page">ویرایش دسته بندی</li>
    <li class="breadcrumb-item active" aria-current="page">{{ $productCategory->name }}</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 ویرایش دسته بندی
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.market.category.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form id="form" action="{{ route('admin.market.category.update', $productCategory->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">نام دسته</label>
                                <input class="form-control form-select-sm" type="text" name="name" id="name" value="{{ old('name', $productCategory->name) }}">
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
                                <label for="parent_id">والد دسته</label>
                                <select class="form-select form-select-sm" name="parent_id" id="parent_id">
                                    <option disabled readonly selected>والد دسته را انتخاب کنید</option>
                                    @forelse($parent_names as $parent_name)
                                        @if($parent_name->id != $productCategory->id)
                                        <option value="{{$parent_name->id}}" @selected(old('parent_id', $productCategory->parent_id) == $parent_name->id) >{{$parent_name->name}}</option>
                                        @endif
                                    @empty
                                    <option class="text-center" disabled readonly>دسته ای در جدول دسته بندی وجود ندارد</option>
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
                                <label for="tags">برچسب ها</label>
                                <input class="form-control form-select-sm d-none" type="text" name="tags" id="tags" value="{{ old('tags', $productCategory->tags) }}">
                                <select name="" id="select_tags" class="select2 form-control-sm form-control" multiple></select>
                                @error('tags')
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
                                <label for="image">تصویر</label>
                                <input class="form-control form-select-sm" type="file" name="image" id="image" accept="image/*">
                                @error('image')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror

                                @if ($productCategory->image)
                                <section class="row mt-2">
                                    @php   
                                        $number = 1;
                                    @endphp

                                    @foreach($productCategory->image['indexArray'] as $key => $value)
                                    <section class="col-{{ 6 / $number }}">
                                        <div class="form-check p-0">
                                            <input type="radio" class="form-check-input d-none set-image" name="currentImage" value="{{ $key }}" id="{{ $number }}"
                                            @checked($productCategory->image['currentImage']  == $key) >
                                            <label for="{{ $number }}" class="form-check-label">
                                                <img src="{{ hasFileUpload($value) }}" class="w-100 max-h" alt="">
                                            </label>
                                        </div>
                                    </section>
                                    @php
                                        $number++;
                                    @endphp
                                    @endforeach

                                </section>
                                @endif
                            </div>
                        </section>
                        <section class="col-12 mb-3">
                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <textarea id="description" name="description">{{ old('description', $productCategory->description) }}</textarea>
                                @error('description')
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
                                <label for="show_in_menu">نمایش در منو</label>
                                <select class="form-select form-select-sm" name="show_in_menu" id="show_in_menu">
                                    <option value="0" @selected(old('show_in_menu', $productCategory->show_in_menu) == 0) >غیر فعال</option>
                                    <option value="1" @selected(old('show_in_menu', $productCategory->show_in_menu) == 1) >فعال</option>
                                </select>
                                @error('show_in_menu')
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
                                    <option value="0" @selected(old('status', $productCategory->status) == 0) >غیر فعال</option>
                                    <option value="1" @selected(old('status', $productCategory->status) == 1) >فعال</option>
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
                </form>
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection
@section('script')
<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/select2-input-config.js') }}"></script>
<script>
    /// CKEDITOR config
    CKEDITOR.replace( 'description');
</script>
@endsection