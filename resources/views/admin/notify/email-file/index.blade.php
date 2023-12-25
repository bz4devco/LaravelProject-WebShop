@extends('admin.layouts.master')

@section('haed-tag')
<!-- status switch on list -->
<link rel="stylesheet" href="{{ asset('admin-assets/css/component-custom-switch.css') }}">

<title>فایل های اطلاعیه ایمیلی | پنل مدیریت</title>
@endsection

@section('content')
<!-- email page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">اطلاع رسانی</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.notify.email.index') }}">اطلاعیه ایمیلی</a></li>
    <li class="breadcrumb-item active" aria-current="page">فایل های اطلاعیه ایمیلی</li>
    <li class="breadcrumb-item active" aria-current="page">{{$email->subject}}</li>
</ol>
</nav>
<!-- email page Breadcrumb area -->

<!--email page emails notify list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 فایل های اطلاعیه ایمیلی ({{$email->subject}})
                </h5>
            </section>
            @include('admin.alerts.alert-section.success')
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <div>
                    <a href="{{ route('admin.notify.email.index') }}" class="btn btn-sm btn-primary text-white ms-2">بازگشت</a>
                    <a href="{{ route('admin.notify.email-file.create', $email->id) }}" class="btn btn-sm btn-info text-white">افزودن فایل به اطلاعیه ایمیلی</a>
                </div>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark table-col-count">
                        <th>#</th>
                        <th>عنوان ایمیل</th>
                        <th>سایز ایمیل</th>
                        <th>نوع فایل</th>
                        <th>وضعیت</th>
                        <th class=" text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($email->files as $key => $file)
                        <tr class="align-middle">
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $email->subject }}</td>
                            <td>{{ $file->file_size }}</td>
                            <td>{{ $file->file_type }}</td>
                            <td>
                                <section>
                                    <div class="custom-switch custom-switch-label-onoff d-flex align-content-center" dir="ltr">
                                        <input data-url="{{ route('admin.notify.email-file.status', $file->id) }}" onchange="changeStatus(this.id)" class="custom-switch-input" id="{{ $file->id }}" name="status" type="checkbox" @if($file->status) checked @endif >
                                        <label class="custom-switch-btn" for="{{ $file->id }}"></label>
                                    </div>
                                </section>
                            </td>
                            <td class="text-start">
                                <a href="{{ route('admin.notify.email-file.edit', $file->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                <form class="d-inline" action="{{ route('admin.notify.email-file.destroy', $file->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="{{ $file->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash ms-2"></i>حذف</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable  py-4">جدول فایل های اطلاعیه ایمیلی خالی می باشد</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </section>
        </section>
    </section>
</section>
<!-- email page emails notify list area -->
@endsection
@section('script')
<script src="{{ asset('admin-assets/js/plugin/ajaxs/status-ajax.js') }}"></script>

@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete','fieldTitle' => 'فایل'])


@endsection
