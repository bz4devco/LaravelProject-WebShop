@extends('admin.layouts.master')

@section('haed-tag')
<title>فرم کالا | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش فروش</a></li>
    <li class="breadcrumb-item active" aria-current="page">فرم کالا</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                فرم کالا
                </h5>
            </section>
            @include('admin.alerts.alert-section.success')
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.market.property.create') }}" class="btn btn-sm btn-info text-white">ایجاد فرم جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive overflow-x-auto">
                <table class="table table-striped table-hover">
                <thead class="border-bottom border-dark table-col-count">
                        <th>#</th>
                        <th>عنوان فرم</th>
                        <th>واحد اندازه گیری</th>
                        <th>دسته والد</th>
                        <th class="max-width-22-rem text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($category_attributes as $category_attribute)    
                        <tr class="align-middle">
                            <th>{{ iteration($loop->iteration, request()->page) }}</th>
                            <td>{{ $category_attribute->name }}</td>
                            <td>{{ $category_attribute->unit }}</td>
                            <td>{{ $category_attribute->category->name }}</td>
                            <td class="width-22-rem text-start">
                                <a href="{{ route('admin.market.property.value.index', $category_attribute->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit ms-2"></i>ویژگی</a>
                                <a href="{{ route('admin.market.property.edit', $category_attribute->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-2"></i>ویرایش</a>
                                <form class="d-inline" action="{{ route('admin.market.property.destroy', $category_attribute->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="{{ $category_attribute->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash ms-2"></i>حذف</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable  py-4">جدول فرم کالا خالی می باشد</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <section class="mb-3 mt-5 d-flex justify-content-center border-0">
                    <nav>
                        {{ $category_attributes->links('pagination::bootstrap-5') }}
                    </nav>
                </section>
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection
@section('script')

@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete','fieldTitle' => 'کالا'])

@endsection
