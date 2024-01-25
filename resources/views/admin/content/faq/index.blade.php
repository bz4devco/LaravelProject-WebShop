@extends('admin.layouts.master')

@section('haed-tag')
<!-- status switch on list -->
<link rel="stylesheet" href="{{ asset('admin-assets/css/component-custom-switch.css') }}">

<title>سوالات متداول | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item active" aria-current="page">سوالات متداول</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    سوالات متداول
                </h5>
            </section>
            @include('admin.alerts.alert-section.success')
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <section>
                    @can('craete-faq')
                    <a href="{{ route('admin.content.faq.create') }}" class="btn btn-sm btn-info text-white">ایجاد پرسش جدید</a>
                    @endcan
                </section>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark table-col-count">
                        <th>#</th>
                        <th>پرسش</th>
                        <th>خلاصه پاسخ</th>
                        @can('edit-faq')
                        <th>وضعیت</th>
                        @endcan
                        <th class="max-width-16-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($faqs as $faq)
                        <tr class="align-middle">
                            <th>{{ iteration($loop->iteration, request()->page) }}</th>
                            <td>{{ $faq->qusetion }}</td>
                            <td class="text-truncate" style="max-width: 120px;">{{ strip_tags($faq->answer) }}</td>
                            @can('edit-faq')
                            <td>
                                <section>
                                    <div class="custom-switch custom-switch-label-onoff d-flex align-content-center" dir="ltr">
                                        <input data-url="{{ route('admin.content.faq.status', $faq->id) }}" onchange="changeStatus(this.id)" class="custom-switch-input" id="{{ $faq->id }}" name="status" type="checkbox" @checked($faq->status) >
                                        <label class="custom-switch-btn" for="{{ $faq->id }}"></label>
                                    </div>
                                </section>
                            </td>
                            @endcan
                            <td class="width-16-rem text-start">
                                @can('edit-faq')
                                <a href="{{ route('admin.content.faq.edit', $faq->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                @endcan
                                @can('delete-faq')
                                <form class="d-inline" action="{{ route('admin.content.faq.destroy', $faq->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="{{ $faq->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash ms-2"></i>حذف</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable py-4">جدول سوالات متداول خالی می باشد</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <section class="mb-3 mt-5 d-flex justify-content-center border-0">
                    <nav>
                        {{ $faqs->links('pagination::bootstrap-5') }}
                    </nav>
                </section>
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection
@section('script')
<script src="{{ asset('admin-assets/js/plugin/ajaxs/status-ajax.js') }}"></script>

@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete','fieldTitle' => 'پرسش'])


@endsection