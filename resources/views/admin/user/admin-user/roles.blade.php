@extends('admin.layouts.master')

@section('haed-tag')
<title> تخصیص نقش | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.user.admin-user.index') }}">کاربران ادمین</a></li>
        <li class="breadcrumb-item active" aria-current="page"> تخصیص نقش </li>
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
                    تخصیص نقش به ادمین ({{$admin->email ?? $admin->mobile}})
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.user.admin-user.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section>
                <form id="form" action="{{ route('admin.user.admin-user.roles.store', $admin->id) }}" method="post">
                    @csrf
                    <section class="row py-4">
                        @if(empty($roles->toArray()))
                        <section>
                            <span class="text-danger d-block text-center ">هیج نقشی تعریف نشده است</span>
                        </section>
                        @else
                        @php
                        $rolesArray = $admin->roles->pluck('id')->toArray();
                        @endphp

                        @foreach($roles as $key => $role)
                        <section class="col-md-3 col-sm-6 col-12">
                            <div class="">
                                <input type="checkbox" class="form-check-input" name="roles[]" id="check{{$key + 1}}" value="{{$role->id}}" {{ (is_array(old('roles' , $rolesArray)) && in_array(old('roles' ,$role->id), $rolesArray)) ? ' checked' : '' }}>
                                <label for="check{{$key + 1}}" class="form-check-label">{{$role->title}}</label>
                            </div>
                            <div class="mt-2">

                            </div>
                        </section>
                        @endforeach
                        @error('roles')
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