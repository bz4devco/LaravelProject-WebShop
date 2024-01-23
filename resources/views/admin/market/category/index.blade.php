@extends('admin.layouts.master')

@section('haed-tag')
<!-- status switch on list -->
<link rel="stylesheet" href="{{ asset('admin-assets/css/component-custom-switch.css') }}">

<title>دسته بندی | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item active" aria-current="page">دسته بندی</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 دسته بندی
                </h5>
            </section>
            @include('admin.alerts.alert-section.success')
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.market.category.create') }}" class="btn btn-sm btn-info text-white">ایجاد دسته بندی</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark table-col-count">
                        <th>#</th>
                        <th>نام دسته بندی</th>
                        <th>دسته والد</th>
                        <th>تصویر</th>
                        <th>عنوان مسیر</th>
                        <th>وضعیت</th>
                        <th>نمایش در منو</th>
                        <th class="max-width-16-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($productCategorys as $productCategory)
                        <tr class="align-middle">
                            <th>{{ iteration($loop->iteration, request()->page) }}</th>
                            <td>{{ $productCategory->name }}</td>
                            <td>{{ $productCategory->parent_id ? $productCategory->parent->name : 'دسته اصلی'}}</td>
                            <td>
                                <img src="{{ hasFileUpload($productCategory->image['indexArray'][$productCategory->image['currentImage']]) }}" width="50" height="50" alt="{{ $productCategory->name }}">
                            </td>
                            <td  class="text-truncate" style="max-width: 150px;" title="{{ $productCategory->slug }}">
                                {{ $productCategory->slug }}
                            </td>
                            <td>
                                <section>
                                    <div class="custom-switch custom-switch-label-onoff d-flex align-content-center" dir="ltr">
                                        <input data-url="{{ route('admin.market.category.status', $productCategory->id) }}" onchange="changeStatus(this.id)" class="custom-switch-input" id="{{ $productCategory->id }}" name="status" type="checkbox" @checked($productCategory->status) >
                                        <label class="custom-switch-btn" for="{{ $productCategory->id }}"></label>
                                    </div>
                                </section>
                            </td>
                            <td>
                                <section>
                                    <div class="custom-switch custom-switch-label-onoff d-flex align-content-center" dir="ltr">
                                        <input data-url="{{ route('admin.market.category.show-in-menu', $productCategory->id) }}" onchange="showInMenu(this.id)" class="custom-switch-input" id="{{ $productCategory->id }}-showinmenu" name="show-in-menu" type="checkbox" @checked($productCategory->show_in_menu) >
                                        <label class="custom-switch-btn" for="{{ $productCategory->id }}-showinmenu"></label>
                                    </div>
                                </section>
                            </td>
                            <td class="width-16-rem text-start">
                                <a href="{{ route('admin.market.category.edit', $productCategory->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                <form class="d-inline" action="{{ route('admin.market.category.destroy', $productCategory->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="{{ $productCategory->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash ms-2"></i>حذف</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable  py-4">جدول دسته بندی خالی می باشد</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <section class="mb-3 mt-5 d-flex justify-content-center border-0">
                    <nav>
                        {{ $productCategorys->links('pagination::bootstrap-5') }}
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
<script src="{{ asset('admin-assets/js/plugin/ajaxs/show-in-menu-ajax.js') }}"></script>

@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete','fieldTitle' => 'دسته بندی'])


@endsection

