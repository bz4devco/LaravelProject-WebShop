@extends('admin.layouts.master')

@section('haed-tag')
<!-- status switch on list -->
<link rel="stylesheet" href="{{ asset('admin-assets/css/component-custom-switch.css') }}">

<title>لیست مسئولین تیکت | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش تیکت ها</a></li>
    <li class="breadcrumb-item active" aria-current="page">لیست مسئولین تیکت</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    لیست مسئولین تیکت
                </h5>
            </section>
            @include('admin.alerts.alert-section.success')
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="#" class="btn btn-sm btn-info text-white disabled">ایجاد ادمین تیکت</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark table-col-count">
                        <th>#</th>
                        <th>نام ادمین</th>
                        <th>ایمیل ادمین</th>
                        <th class="max-width-16-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($admins as $key => $admin)
                        {{-- approved button status check and show --}}
                            @php
                            $btn_style = ($admin->ticketAdmin != null) ? 'danger' : 'success';
                            $icon_style = ($admin->ticketAdmin != null) ? 'times' : 'check';
                            $btn_text = ($admin->ticketAdmin != null) ? 'حذف' : 'افزودن';
                            $attr_checked = ($admin->ticketAdmin != null) ? 'checked' : '';
                        @endphp

                        <tr class="align-middle">
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $admin->full_name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td class="width-16-rem text-start">
                            <button {{$attr_checked}} type="button" data-url="{{ route('admin.ticket.admin.set', $admin->id) }}" onclick="adminTicket(this.id)" id="{{ $admin->id }}-adminTicket" class="btn border-0 btn-{{$btn_style}} btn-sm"><i class="fa fa-{{$icon_style}} ms-1 align-middle"></i>{{$btn_text}}</button>
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable  py-4">جدول لیست مسئولین تیکت خالی می باشد</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </section>
        </section>
    </section>
</section>

<!-- category page category list area -->
@endsection
@section('script')
<script src="{{ asset('admin-assets/js/plugin/ajaxs/admin-ticket-ajax.js') }}"></script>
@endsection

