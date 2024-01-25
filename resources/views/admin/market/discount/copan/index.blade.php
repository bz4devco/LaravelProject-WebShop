@extends('admin.layouts.master')

@section('haed-tag')
<!-- status switch on list -->
<link rel="stylesheet" href="{{ asset('admin-assets/css/component-custom-switch.css') }}">

<title>کوپن تخفیف | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
        <li class="breadcrumb-item active" aria-current="page">کوپن تخفیف</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    کوپن تخفیف
                </h5>
            </section>
            @include('admin.alerts.alert-section.success')
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <section>
                    @can('create-copan')
                    <a href="{{ route('admin.market.discount.copan.create') }}" class="btn btn-sm btn-info text-white">ایجاد کپن تخفیف </a>
                    @endcan
                </section>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive overflow-x-auto">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark table-col-count">
                        <th>#</th>
                        <th>کد کوپن</th>
                        <th>میزان تخفیف</th>
                        <th>نوع تخفیف</th>
                        <th>سقف تخفیف</th>
                        <th>نوع کوپن</th>
                        <th>تاریخ شروع</th>
                        <th>تاریخ پایان</th>
                        @can('edit-copan')
                        <th>وضعبت</th>
                        @endcan
                        <th class="max-width-16-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($copans as $copan)
                        <tr class="align-middle">
                            <th>{{ iteration($loop->iteration, request()->page) }}</th>
                            <td>{{$copan->code}}</td>
                            <td>{{($copan->amount_type == 0) ? $copan->amount . '%' : number_format($copan->amount) . 'تومان'}}</td>
                            <td>{{$copan->type == 0 ? 'درصدی' : 'عددی'}}</td>
                            <td><span>{{number_format($copan->discount_ceiling ?? 0)}}<span>تومان</span></span></td>
                            <td>{{$copan->type == 0 ? 'عمومی' : 'خصوصی'}}</td>
                            <td>{{jalaliDate($copan->start_date)}}</td>
                            <td>{{jalaliDate($copan->end_date)}}</td>
                            @can('edit-copan')
                            <td>
                                <section>
                                    <div class="custom-switch custom-switch-label-onoff d-flex align-content-center" dir="ltr">
                                        <input data-url="{{ route('admin.market.discount.copan.status', $copan->id) }}" onchange="changeStatus(this.id)" class="custom-switch-input" id="{{ $copan->id }}" name="status" type="checkbox" @checked($copan->status) >
                                        <label class="custom-switch-btn" for="{{ $copan->id }}"></label>
                                    </div>
                                </section>
                            </td>
                            @endcan
                            <td class="width-16-rem text-start">
                                @can('edit-copan')
                                <a href="{{ route('admin.market.discount.copan.edit', $copan->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                @endcan
                                @can('delete-copan')
                                <form class="d-inline" action="{{ route('admin.market.discount.copan.destroy', $copan->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="{{ $copan->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash ms-2"></i>حذف</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable  py-4">جدول کوپن تخفیف خالی می باشد</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <section class="mb-3 mt-5 d-flex justify-content-center border-0">
                    <nav>
                        {{ $copans->links('pagination::bootstrap-5') }}
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

@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete','fieldTitle' => 'کوپن تخفیف'])

@endsection