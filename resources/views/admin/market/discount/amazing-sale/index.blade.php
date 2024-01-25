@extends('admin.layouts.master')

@section('haed-tag')
<!-- status switch on list -->
<link rel="stylesheet" href="{{ asset('admin-assets/css/component-custom-switch.css') }}">

<title>فروش شگفت انگیز | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
        <li class="breadcrumb-item active" aria-current="page">فروش شگفت انگیز</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    فروش شگفت انگیز
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <section>
                    @can('create-amazing-sale')
                    <a href="{{ route('admin.market.discount.amazing-sale.create') }}" class="btn btn-sm btn-info text-white">افزودن کالا به لیست فروش شگفت انگیز</a>
                    @endcan
                </section>

                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            @include('admin.alerts.alert-section.success')
            <section class="table-responsive overflow-x-auto">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark table-col-count">
                        <th>#</th>
                        <th>نام کالا</th>
                        <th>درصد تخفیف</th>
                        <th>تاریخ شروع</th>
                        <th>تاریخ پایان</th>
                        @can('edit-amazing-sale')
                        <th>وضعبت</th>
                        @endcan
                        <th class="max-width-16-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($amazingSales as $amazingSale)
                        <tr class="align-middle">
                            <th>{{ iteration($loop->iteration, request()->page) }}</th>
                            <td class="text-truncate" style="max-width: 160px;" title="{{$amazingSale->product->name}}">{{$amazingSale->product->name}}</td>
                            <td>{{$amazingSale->percentage}}%</td>
                            <td>{{jalaliDate($amazingSale->start_date)}}</td>
                            <td>{{jalaliDate($amazingSale->end_date)}}</td>
                            @can('edit-amazing-sale')
                            <td>
                                <section>
                                    <div class="custom-switch custom-switch-label-onoff d-flex align-content-center" dir="ltr">
                                        <input data-url="{{ route('admin.market.discount.amazing-sale.status', $amazingSale->id) }}" onchange="changeStatus(this.id)" class="custom-switch-input" id="{{ $amazingSale->id }}" name="status" type="checkbox" @checked($amazingSale->status) >
                                        <label class="custom-switch-btn" for="{{ $amazingSale->id }}"></label>
                                    </div>
                                </section>
                            </td>
                            @endcan
                            <td class="width-16-rem text-start">
                                @can('edit-amazing-sale')
                                <a href="{{ route('admin.market.discount.amazing-sale.edit', $amazingSale->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                @endcan
                                @can('delete-amazing-sale')
                                <form class="d-inline" action="{{ route('admin.market.discount.amazing-sale.destroy', $amazingSale->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="{{ $amazingSale->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash ms-2"></i>حذف</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable  py-4">جدول فروش شگفت انگیز خالی می باشد</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <section class="mb-3 mt-5 d-flex justify-content-center border-0">
                    <nav>
                        {{ $amazingSales->links('pagination::bootstrap-5') }}
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

@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete','fieldTitle' => 'فروش فوق شگفت انگیز'])

@endsection