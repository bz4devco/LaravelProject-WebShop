@extends('admin.layouts.master')

@section('haed-tag')
<link rel="stylesheet" href="{{ asset('admin-assets/css/component-custom-switch.css') }}">

<title>نقش ها | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش کاربران</a></li>
        <li class="breadcrumb-item active" aria-current="page">نقش ها</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    نقش ها
                </h5>
            </section>
            @include('admin.alerts.alert-section.success')
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.user.role.create') }}" class="btn btn-sm btn-info text-white">ایجاد نقش جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark table-col-count">
                        <th>#</th>
                        <th>عنوان نقش</th>
                        <th>دسترسی ها</th>
                        <th>وضعیت</th>
                        <th class="max-width-22-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($roles as $key => $role)

                        @php

                        $permisionTitle = '';
                        if($role->permissions()->get()->toArray()):
                        foreach($role->permissions as $key => $permision):
                        $permisionTitle .= ($key + 1) . '- ' . $permision->title . ' <br> ';
                        endforeach;
                        endif;
                        
                        @endphp

                        <tr class="align-middle">
                            <th>{{ iteration($loop->iteration, request()->page) }}</th>
                            <td>{{ $role->title}}</td>
                            <td class="text-truncate" style="max-height: 80px !important;" title="{{strip_tags($permisionTitle)}}">
                                @if(!$permisionTitle)
                                <span class="text-danger">برای این نقش هیچ سطح دسترسی تعریف نشده است</span>
                                @else
                                {!! Str::limit($permisionTitle, 100) !!}
                                @endif
                            </td>
                            <td>
                                <section>
                                    <div class="custom-switch custom-switch-label-onoff d-flex align-content-center" dir="ltr">
                                        <input data-url="{{ route('admin.user.role.status', $role->id) }}" onchange="changeStatus(this.id)" class="custom-switch-input" id="{{ $role->id }}" name="status" type="checkbox" @checked($role->status) >
                                        <label class="custom-switch-btn" for="{{ $role->id }}"></label>
                                    </div>
                                </section>
                            </td>
                            <td class="width-22-rem text-start">
                                <a href="{{ route('admin.user.role.permission-form', $role->id) }}" class="btn btn-success btn-sm"><i class="fa fa-user-graduate ms-2"></i>دسترسی ها</a>
                                <a href="{{ route('admin.user.role.edit', $role->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                <form class="d-inline" action="{{ route('admin.user.role.destroy', $role->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="{{ $role->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash ms-2"></i>حذف</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable  py-4">جدول نقش ها خالی می باشد</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <section class="mb-3 mt-5 d-flex justify-content-center border-0">
                    <nav>
                        {{ $roles->links('pagination::bootstrap-5') }}
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

@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete','fieldTitle' => 'نقش'])


@endsection