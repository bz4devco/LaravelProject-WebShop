@extends('admin.layouts.master')

@section('haed-tag')
<link rel="stylesheet" href="{{ asset('admin-assets/css/component-custom-switch.css') }}">

<title>مشتریان | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش کاربران</a></li>
        <li class="breadcrumb-item active" aria-current="page">مشتریان</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    مشتریان
                </h5>
            </section>
            @include('admin.alerts.alert-section.success')
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <section>
                    @can('create-customer')
                    <a href="{{ route('admin.user.costumer.create') }}" class="btn btn-sm btn-info text-white">ایجاد مشتری جدید</a>
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
                        <th>ایمیل</th>
                        <th>شماره موبایل</th>
                        <th>کد ملی</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>فعال سازی</th>
                        @can('edit-customer')
                        <th>وضعیت</th>
                        @endcan
                        <th class="max-width-16-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($costumers as $key => $costumer)
                        <tr class="align-middle">
                            <th>{{ iteration($loop->iteration, request()->page) }}</th>
                            <td>{{ $costumer->email }}</td>
                            <td>{{ $costumer->mobile }}</td>
                            <td>{{ $costumer->national_code }}</td>
                            <td>{{ $costumer->first_name }}</td>
                            <td>{{ $costumer->last_name }}</td>
                            @can('edit-customer')
                            <td>
                                <section>
                                    <div class="custom-switch custom-switch-label-onoff d-flex align-content-center" dir="ltr">
                                        <input data-url="{{ route('admin.user.costumer.activation', $costumer->id) }}" onchange="changeActivation(this.id)" class="custom-switch-input" id="active-{{ $costumer->id }}" name="activation" type="checkbox" @checked($costumer->activation) >
                                        <label class="custom-switch-btn" for="active-{{ $costumer->id }}"></label>
                                    </div>
                                </section>
                            </td>
                            <td>
                                <section>
                                    <div class="custom-switch custom-switch-label-onoff d-flex align-content-center" dir="ltr">
                                        <input data-url="{{ route('admin.user.costumer.status', $costumer->id) }}" onchange="changeStatus(this.id)" class="custom-switch-input" id="status-{{ $costumer->id }}" name="status" type="checkbox" @checked($costumer->status) >
                                        <label class="custom-switch-btn" for="status-{{ $costumer->id }}"></label>
                                    </div>
                                </section>
                            </td>
                            @endcan
                            <td class="width-16-rem text-start">
                                @can('edit-customer')
                                <a href="{{ route('admin.user.costumer.edit', $costumer->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                @endcan
                                @can('delete-customer')
                                <form class="d-inline" action="{{ route('admin.user.costumer.destroy', $costumer->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="{{ $costumer->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash ms-2"></i>حذف</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable  py-4">جدول مشتریان خالی می باشد</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <section class="mb-3 mt-5 d-flex justify-content-center border-0">
                    <nav>
                        {{ $costumers->links('pagination::bootstrap-5') }}
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

@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete','fieldTitle' => 'مشتری'])


@endsection