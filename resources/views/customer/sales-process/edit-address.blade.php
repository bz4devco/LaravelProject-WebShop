@extends('customer.layouts.master-one-col')

@section('haed-tag')
<link rel="stylesheet" href="{{ asset('customer-assets/css/address.css') }}">

<title></title>
@endsection
@section('content')
<!-- start cart -->
<section class="mb-4">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <!-- start vontent header -->
                <section class="content-header">
                    <section class="d-flex justify-content-between align-items-center">
                        <h2 class="content-header-title">
                            <span>ویرایش آدرس</span>
                        </h2>
                    </section>
                </section>

                <section class="row mt-4 d-flex justify-content-center">
                    <section class="col-md-9">
                        <section class="content-wrapper bg-white p-3 rounded-2 mb-4">
                            <form id="address-form" class="row" action="{{route('customer.sales-process.update-address', $address->id)}}" method="post">
                                @csrf
                                @method('PUT')

                                <section class="col-6 mb-2">
                                    <label for="province" class="form-label mb-1">استان</label>
                                    <select class="form-select form-select-sm" id="province" name="province_id">
                                        <option disabled selected>استان را انتخاب کنید</option>
                                        @foreach ($provinces as $province)
                                        <option value="{{$province->id}}" data-url="{{ route('customer.sales-process.get-cities', $province->id)}}" @if(old('province_id', $address->city->province->id) == $province->id) selected @endif>{{$province->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-6 mb-2">
                                    <label for="city" class="form-label mb-1">شهر</label>
                                    <select class="form-select form-select-sm" id="city" name="city_id" data-old="{{old('city_id', $address->city_id)}}">
                                        <option disabled selected>شهر را انتخاب کنید</option>
                                    </select>
                                    @error('city_id')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 mb-2">
                                    <label for="address" class="form-label mb-1">نشانی</label>
                                    <textarea class="form-control " id="address" name="address" placeholder="نشانی">{{ old('address', $address->address) }}</textarea>
                                    @error('address')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>

                                <section class="col-6 mb-2">
                                    <label for="postal_code" class="form-label mb-1">کد پستی</label>
                                    <input type="text" class="form-control " id="postal_code" name="postal_code" placeholder="کد پستی" value="{{ old('postal_code', $address->postal_code) }}">
                                    @error('postal_code')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>

                                <section class="col-3 mb-2">
                                    <label for="no" class="form-label mb-1">پلاک</label>
                                    <input type="text" class="form-control  number" id="no" name="no" placeholder="پلاک" value="{{ old('no', $address->no) }}">
                                    @error('no')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>

                                <section class="col-3 mb-2">
                                    <label for="unit" class="form-label mb-1">واحد</label>
                                    <input type="text" class="form-control  number" id="unit" name="unit" placeholder="واحد" value="{{ old('unit', $address->unit) }}">
                                    @error('unit')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>

                                <section class="border-bottom my-3"></section>

                                <section class="col-12 mb-2">
                                    <section class="form-check">
                                        <section>
                                            <input class="form-check-input" type="checkbox" name="receiver" id="receiver" @if(old('receiver', $address->receiver)=='on' ) checked @endif>
                                            <label class="form-check-label" for="receiver">
                                                گیرنده سفارش خودم هستم
                                            </label>
                                        </section>
                                    </section>
                                </section>

                                <section class="col-6 mb-2">
                                    <label for="first_name" class="form-label mb-1">نام گیرنده</label>
                                    <input type="text" class="form-control " id="first_name" name="recipient_first_name" placeholder="نام گیرنده" value="{{ old('recipient_first_name', $address->recipient_first_name) }}">
                                    @error('recipient_first_name')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>

                                <section class="col-6 mb-2">
                                    <label for="last_name" class="form-label mb-1">نام خانوادگی گیرنده</label>
                                    <input type="text" class="form-control " id="last_name" name="recipient_last_name" placeholder="نام خانوادگی گیرنده" value="{{ old('recipient_last_name', $address->recipient_last_name) }}">
                                    @error('recipient_last_name')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>

                                <section class="col-6 mb-2">
                                    <label for="mobile" class="form-label mb-1">شماره موبایل</label>
                                    <section class="input-group input-group-sm">
                                        <input type="text" style="direction: ltr;" class="form-control  text-end" name="mobile" id="mobile" value="{{ old('mobile', substr($address->mobile, 1)) }}" placeholder="(9××) ××× ××××">
                                        <span class="input-group-text" id="deliver-price">+98</span>
                                    </section>
                                    @error('mobile')
                                    <span class="text-danger font-size-12">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>

                                <section class="modal-footer  pt-3 mt-3">
                                    <button type="button" onclick="document.getElementById('address-form').submit()" class="btn btn-sm btn-primary">ثبت آدرس</button>
                            </form>
                            <form id="delete-address-{{$address->id}}" action="{{route('customer.sales-process.delete-address', $address->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger delete"><i class="fa fa-trash-alt me-1"></i>حذف آدرس</button>
                            </form>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>
</section>
<!-- end cart -->

@endsection
@section('script')
<script src="{{ asset('customer-assets/js/pages/address-and-delivery.js') }}"></script>
<script src="{{ asset('customer-assets/js/forms/mask-input/jquery.inputmask.js') }}"></script>
<script src="{{ asset('customer-assets/js/forms/price-format.js') }}"></script>
<script src="{{ asset('customer-assets/js/ajax/get-cities-ajax.js') }}"></script>

<script>
    $("#postal_code").inputmask("mask", {
        "mask": "9999999999"
    });
    $("#mobile").inputmask("mask", {
        "mask": "(999) 999-9999"
    });
</script>

@include('customer.alerts.sweetalert.delete-confirm', ['className' => 'delete','fieldTitle' => ' این آدرس'])

@endsection