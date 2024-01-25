@extends('admin.layouts.master')

@section('haed-tag')
<link rel="stylesheet" href="{{ asset('admin-assets/css/component-custom-switch.css') }}">

<title>دسترسی ها | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش کاربران</a></li>
        <li class="breadcrumb-item active" aria-current="page">دسترسی ها</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    دسترسی ها
                </h5>
            </section>
            @include('admin.alerts.alert-section.success')
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <section>
                    @can('create-permission')
                    <a href="{{ route('admin.user.permission.create') }}" class="btn btn-sm btn-info text-white">ایجاد دسترسی جدید</a>
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
                        <th>عنوان سطح دسترسی</th>
                        <th>نام نقش ها</th>
                        <th>توضیحات دسترسی</th>
                        @can('edit-permission')
                        <th>وضعیت</th>
                        @endcan
                        <th class="max-width-22-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($permissions as $permission)
                        <tr class="align-middle">
                            <th>{{ iteration($loop->iteration, request()->page) }}</th>
                            <td>{{ $permission->title}}</td>
                            <td>
                                @if(empty($permission->roles()->get()->toArray()))
                                <span class="text-danger">این سطح دسترسی برای هیچ نقشی انتخاب نشده است</span>
                                @else
                                @foreach($permission->roles as $key => $role)
                                {{$key + 1}}- {{$role->title}}<br>
                                @endforeach
                                @endif
                            </td>
                            <td class="text-truncate" style="max-width: 150px;" title="{{ $permission->description }}">
                                {{ $permission->description}}
                            </td>
                            @can('edit-permission')
                            <td>
                                <section>
                                    <div class="custom-switch custom-switch-label-onoff d-flex align-content-center" dir="ltr">
                                        <input data-url="{{ route('admin.user.permission.status', $permission->id) }}" onchange="changeStatus(this.id)" class="custom-switch-input" id="{{ $permission->id }}" name="status" type="checkbox" @checked($permission->status) >
                                        <label class="custom-switch-btn" for="{{ $permission->id }}"></label>
                                    </div>
                                </section>
                            </td>
                            @endcan
                            <td class="width-22-rem text-start">
                                @can('edit-permission')
                                <a href="{{ route('admin.user.permission.edit', $permission->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                @endcan
                                @can('delete-permission')
                                <form class="d-inline" action="{{ route('admin.user.permission.destroy', $permission->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="{{ $permission->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash ms-2"></i>حذف</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable  py-4">جدول دسترسی ها خالی می باشد</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <section class="mb-3 mt-5 d-flex justify-content-center border-0">
                    <nav>
                        {{ $permissions->links('pagination::bootstrap-5') }}
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

@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete','fieldTitle' => 'سطح دسترسی'])


@endsection