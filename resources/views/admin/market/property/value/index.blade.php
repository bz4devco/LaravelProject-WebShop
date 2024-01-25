@extends('admin.layouts.master')

@section('haed-tag')
<title>مقدار فرم کالا | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.market.property.index') }}">فرم کالا</a></li>
        <li class="breadcrumb-item active" aria-current="page">مقدار فرم کالا</li>
        <li class="breadcrumb-item active" aria-current="page">{{ $categoryAttribute->name}}</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    مقدار فرم کالا
                </h5>
            </section>
            @include('admin.alerts.alert-section.success')
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <div>
                    <a href="{{ route('admin.market.property.index') }}" class="btn btn-sm btn-primary text-white">بازگشت</a>
                    @can('create-property-value')
                    <a href="{{ route('admin.market.property.value.create', $categoryAttribute->id) }}" class="btn btn-sm btn-info text-white">ایجاد مقدار فرم کالا جدید</a>
                    @endcan
                </div>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive overflow-x-auto">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark table-col-count">
                        <th>#</th>
                        <th>عنوان فرم</th>
                        <th>نام محصول</th>
                        <th>مقدار</th>
                        <th>افزایش قیمت</th>
                        <th>نوع</th>
                        <th class="max-width-18-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($categoryAttribute->values as $value)
                        <tr class="align-middle">
                            <th>{{ iteration($loop->iteration, request()->page) }}</th>
                            <td>{{ $categoryAttribute->name }}</td>
                            <td class="text-truncate" style="max-width: 150px;">{{ $value->product->name }}</td>
                            <td>{{ json_decode($value->value)->value }}</td>
                            <td>{{ number_format(json_decode($value->value)->price_increase) }} تومان</td>
                            <td>{{ $value->type == 0 ? 'ساده' : 'انتخابی' }}</td>
                            <td class="width-18-rem text-start">
                                @can('edit-property-value')
                                <a href="{{ route('admin.market.property.value.edit', ['categoryAttribute' => $categoryAttribute->id, 'value' => $value->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                @endcan
                                @can('delete-property-value')
                                <form class="d-inline" action="{{ route('admin.market.property.value.destroy', ['categoryAttribute' => $categoryAttribute->id, 'value' => $value->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="{{ $value->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash ms-2"></i>حذف</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable  py-4">جدول مقدار فرم کالا خالی می باشد</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <section class="mb-3 mt-5 d-flex justify-content-center border-0">
                    <nav>
                        {{ $categoryAttribute->values()->paginate(15)->links('pagination::bootstrap-5') }}
                    </nav>
                </section>
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection
@section('script')

@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete','fieldTitle' => 'مقدار فرم کالا'])

@endsection