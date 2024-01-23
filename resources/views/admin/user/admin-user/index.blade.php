@extends('admin.layouts.master')

@section('haed-tag')
<link rel="stylesheet" href="{{ asset('admin-assets/css/component-custom-switch.css') }}">

<title>کاربران ادمین | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش کاربران</a></li>
        <li class="breadcrumb-item active" aria-current="page">کاربران ادمین</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    کاربران ادمین
                </h5>
            </section>
            @include('admin.alerts.alert-section.success')
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.user.admin-user.create') }}" class="btn btn-sm btn-info text-white">ایجاد ادمین جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark table-col-count">
                        <th>#</th>
                        <th>ایمیل</th>
                        <th>شماره موبایل</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>نقش</th>
                        <th>فعال سازی</th>
                        <th>وضعیت</th>
                        <th class="max-width-22-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($admins as $key => $admin)
                        <tr class="align-middle">
                            <th>{{ iteration($loop->iteration, request()->page) }}</th>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->mobile }}</td>
                            <td>{{ $admin->first_name }}</td>
                            <td>{{ $admin->last_name }}</td>
                            <td>
                                @if(empty($admin->roles()->get()->toArray()))
                                <span class="text-danger">برای این ادمین هیچ نقشی تعریف نشده است</span>
                                @else
                                @foreach($admin->roles as $key => $roles)
                                {{$key + 1}}- {{$roles->title}}<br>
                                @endforeach
                                @endif
                            </td>
                            <td>
                                <section>
                                    <div class="custom-switch custom-switch-label-onoff d-flex align-content-center" dir="ltr">
                                        <input data-url="{{ route('admin.user.admin-user.activation', $admin->id) }}" onchange="changeActivation(this.id)" class="custom-switch-input" id="active-{{ $admin->id }}" name="activation" type="checkbox" @checked($admin->activation) >
                                        <label class="custom-switch-btn" for="active-{{ $admin->id }}"></label>
                                    </div>
                                </section>
                            </td>
                            <td>
                                <section>
                                    <div class="custom-switch custom-switch-label-onoff d-flex align-content-center" dir="ltr">
                                        <input data-url="{{ route('admin.user.admin-user.status', $admin->id) }}" onchange="changeStatus(this.id)" class="custom-switch-input" id="status-{{ $admin->id }}" name="status" type="checkbox" @checked($admin->status) >
                                        <label class="custom-switch-btn" for="status-{{ $admin->id }}"></label>
                                    </div>
                                </section>
                            </td>
                            <td class="width-22-rem text-start">
                                <a href="{{ route('admin.user.admin-user.permissions', $admin->id) }}" class="btn btn-success btn-sm"><i class="fa fa-user-graduate ms-2"></i>دسترسی</a>
                                <a href="{{ route('admin.user.admin-user.roles', $admin->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit ms-2"></i>نقش</a>
                                <a href="{{ route('admin.user.admin-user.edit', $admin->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                <form class="d-inline" action="{{ route('admin.user.admin-user.destroy', $admin->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="{{ $admin->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash ms-2"></i>حذف</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable  py-4">جدول کاربران ادمین خالی می باشد</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <section class="mb-3 mt-5 d-flex justify-content-center border-0">
                    <nav>
                        {{ $admins->links('pagination::bootstrap-5') }}
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
<script src="{{ asset('admin-assets/js/plugin/ajaxs/activation-ajax.js') }}"></script>

@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete','fieldTitle' => 'ادمین'])


@endsection