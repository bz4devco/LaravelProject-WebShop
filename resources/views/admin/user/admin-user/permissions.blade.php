@extends('admin.layouts.master')

@section('haed-tag')
<title> تخصیص سطح دسترسی | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.user.admin-user.index') }}">کاربران ادمین</a></li>
        <li class="breadcrumb-item active" aria-current="page"> تخصیص سطح دسترسی </li>
        <li class="breadcrumb-item active" aria-current="page">{{$admin->email ?? $admin->mobile}}</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    تخصیص سطح دسترسی منحصربفرد به ادمین ({{$admin->email ?? $admin->mobile}})
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.user.admin-user.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section>
                <form id="form" action="{{ route('admin.user.admin-user.permissions.store', $admin->id) }}" method="post">
                    @csrf
                    <section class="row py-4">
                        @if(empty($permissions->toArray()))
                        <section>
                            <span class="text-danger d-block text-center ">هیج سطح دسترسی تعریف نشده است</span>
                        </section>
                        @else
                        @php
                        $rolePermissionsArray = $admin->permissions->pluck('id')->toArray();
                        @endphp

                        @foreach($permissions as $key => $permission)
                        <section class="col-md-3 col-sm-6 col-12">
                            <div class="">
                                <input type="checkbox" class="form-check-input" name="permissions[]" id="check{{$key + 1}}" value="{{$permission->id}}" {{ (is_array(old('permissions' , $rolePermissionsArray)) && in_array(old('permissions' ,$permission->id), $rolePermissionsArray)) ? ' checked' : '' }}>
                                <label for="check{{$key + 1}}" class="form-check-label">{{$permission->title}}</label>
                            </div>
                            <div class="mt-2">

                            </div>
                        </section>
                        @endforeach
                        @error('permissions')
                        <span class="text-danger font-size-12">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                        @endif
                    </section>
                    <section class="border-top pt-3">
                        <section class="col-12 col-md-2 d-flex flex-column justify-content-center">
                            <div class="form-group ">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </div>
                        </section>
                    </section>
            </section>
            </form>
        </section>
    </section>
</section>
</section>
<!-- category page category list area -->
@endsection