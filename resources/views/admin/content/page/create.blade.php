@extends('admin.layouts.master')

@section('haed-tag')
<title> ایجاد پیج | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.content.page.index') }}">پیج ساز</a></li>
        <li class="breadcrumb-item active" aria-current="page">ایجاد پیج</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    ایجاد پیج
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.content.page.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form id="form" action="{{ route('admin.content.page.store') }}" method="post">
                    @csrf
                    <section class="row">
                        <section class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="title">عنوان</label>
                                <input id="title" name="title" class="form-control form-select-sm" type="text" value="{{ old('title') }}">
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
                                <label for="url">آدرس URL</label>
                                <input id="url" name="url" class="form-control form-select-sm" type="text" value="{{ old('url') }}">
                                @error('url')
                                <span class="text-danger font-size-12">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </div>
                        </section>
                        <section class="col-12 mb-3">
                            <div class="form-group">
                                <label for="body">محتوی</label>
                                <textarea id="body" name="body">{{ old('body') }}</textarea>
                                @error('body')
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
                                <input class="form-control form-select-sm d-none" type="text" name="tags" id="tags" value="{{ old('tags') }}">
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
<script type="text/javascript" src="{{ asset('admin-assets/js/mask-input/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin-assets/js/plugin/form/select2-input-config.js') }}"></script>

<script>
    CKEDITOR.replace('body', {
        filebrowserUploadUrl: `{{route('admin.content.page.upload-images-ckeditor').'?_token='.csrf_token()}}`,
        filebrowserImageUploadUrl: `{{route('admin.content.page.upload-images-ckeditor').'?_token='.csrf_token()}}`,
    });
</script>
@endsection