@extends('customer.layouts.master-one-col')

@section('haed-tag')
<meta name="robots" content="index, nofollow">
<link rel="stylesheet" href="{{ asset('customer-assets/css/address.css') }}">

<title>انتخاب آدرس و نحوه ارسال | {{$setting->title}}</title>
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
                            <span>تکمیل اطلاعات ارسال کالا (آدرس گیرنده، مشخصات گیرنده، نحوه ارسال) </span>
                        </h2>
                    </section>
                </section>

                <section class="row mt-4">
                    <section class="col-md-9">
                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            انتخاب آدرس و مشخصات گیرنده
                                        </h2>
                                    </section>
                                </section>

                                <section class="address-alert alert alert-primary d-flex align-items-center p-2" role="alert">
                                    <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                    <secrion>
                                        پس از ایجاد آدرس، آدرس را انتخاب کنید.
                                    </secrion>
                                </section>

                                <section class="address-select">
                                    @foreach ($addresses as $address)
                                    <input type="radio" name="address_id" value="{{$address->id}}" form="add-address-form" id="a{{$address->id}}" /> <!--checked="checked"-->
                                    <label for="a{{$address->id}}" class="address-wrapper mb-2 p-2">
                                        <section class="mb-2">
                                            <i class="fa fa-map-marker-alt mx-1"></i>
                                            آدرس :  {{$address->fullAddress()}}
                                        </section>
                                        <section class="mb-2">
                                            <i class="fas fa-inbox me-1"></i>
                                            کد پستی : {{$address->postal_code}}
                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-user-tag me-1"></i>
                                            گیرنده : {{empty(trim($address->recipient_full_name)) ? auth()->user()->full_name : $address->recipient_full_name}}
                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-mobile-alt mx-1"></i>
                                            موبایل گیرنده : {{$address->mobile}}
                                        </section>
                                        <a class="" href="{{route('customer.sales-process.edit-address', $address->id)}}"><i class="fa fa-edit"></i> ویرایش آدرس</a>
                                        <form id="delete-address-{{$address->id}}" action="{{route('customer.sales-process.delete-address', $address->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="top:38%;" class="delete"><i class="fa fa-trash"></i> حذف آدرس</button>
                                        </form>
                                        <span class="address-selected">کالاها به این آدرس ارسال می شوند</span>
                                    </label>
                                    @endforeach
                                    <section class="address-add-wrapper">
                                        <button class="address-add-button" type="button" data-bs-toggle="modal" data-bs-target="#add-address"><i class="fa fa-plus"></i> ایجاد آدرس جدید</button>

                                    </section>

                                </section>
                            </section>


                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            انتخاب نحوه ارسال
                                        </h2>
                                    </section>
                                </section>
                                <section class="delivery-select ">

                                    <section class="address-alert alert alert-primary d-flex align-items-center p-2" role="alert">
                                        <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                        <secrion>
                                            نحوه ارسال کالا را انتخاب کنید. هنگام انتخاب لطفا مدت زمان ارسال را در نظر بگیرید.
                                        </secrion>
                                    </section>
                                    @forelse ($deliverys as $delivery)
                                    <input type="radio" name="delivery_id" data-delivery-price="{{$delivery->amount}}" form="add-address-form" value="{{$delivery->id}}" id="d{{$delivery->id}}" />
                                    <label for="d{{$delivery->id}}" class="col-12 col-md-4 delivery-wrapper mb-2 pt-2">
                                        <section class="mb-2">
                                            <i class="fa fa-shipping-fast mx-1"></i>
                                            {{$delivery->name}}
                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-calendar-alt mx-1"></i>
                                            {{$delivery->delivery_times}}
                                        </section>
                                    </label>
                                    @empty
                                    <label for="d2" class="col-12 delivery-wrapper mb-2 pt-2">
                                        <section class="py-2">
                                            نحوه ارسالی وجود ندارد
                                        </section>
                                    </label>
                                    @endforelse

                                </section>
                            </section>
                    </section>

                    @php
                    $totalProductPrice = 0;
                    $totalDiscount = 0;
                    @endphp
                    @foreach ($cartItems as $cartItem)
                    @php
                    $totalProductPrice += $cartItem->cartItemProductPrice() * $cartItem->number;
                    $totalDiscount += $cartItem->cartItemProductDiscount() * $cartItem->number;
                    @endphp
                    @endforeach

                    <section class="col-md-3">
                        <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">قیمت کالاها ({{$cartItems->count()}})</p>
                                <p class="text-muted">{{number_format($totalProductPrice)}} تومان</p>
                            </section>

                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">تخفیف کالاها</p>
                                <p class="text-danger fw-bolder">{{number_format($totalDiscount)}} تومان</p>
                            </section>

                            <section class="border-bottom mb-3"></section>

                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">جمع سبد خرید</p>
                                <p class="fw-bolder" id="total-price" data-total-price="{{number_format($totalProductPrice - $totalDiscount)}}">{{number_format($totalProductPrice - $totalDiscount)}} تومان</p>
                            </section>

                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">هزینه ارسال</p>
                                <p class="text-warning"><span id="delivery-price">0</span> تومان</p>
                            </section>

                            <p class="my-3">
                                <i class="fa fa-info-circle me-1"></i> کاربر گرامی کالاها بر اساس نوع ارسالی که انتخاب می کنید در مدت زمان ذکر شده ارسال می شود.
                            </p>

                            <section class="border-bottom mb-3"></section>

                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">مبلغ قابل پرداخت</p>
                                <p class="fw-bold"><span id="payment-price">{{number_format($totalProductPrice - $totalDiscount)}}</span> تومان</p>
                            </section>
                            
                            <form id="add-address-form" action="{{ route('customer.sales-process.choose-address-and-delivery') }}" method="post">
                            @csrf
                            </form>

                            <section class="">
                                <section id="address-button" href="address.html" class="text-warning border border-warning text-center py-2 pointer rounded-2 d-block">آدرس و نحوه ارسال را انتخاب کن</section>
                                <button id="next-level" type="button" onclick="document.getElementById('add-address-form').submit()" class="btn btn-danger d-none w-100">ادامه فرآیند خرید</button>
                            </section>

                        </section>
                    </section>
                </section>
            </section>
        </section>

    </section>
</section>
<!-- end cart -->

@include('customer.model.add-address-modal')

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
@if($errors->any())
<script>
    $(document).ready(function() {
        $("#add-address").modal('show');
    });
</script>
@endif

@include('customer.alerts.sweetalert.success')
@include('customer.alerts.sweetalert.error')

@include('customer.alerts.sweetalert.delete-confirm', ['className' => 'delete','fieldTitle' => ' این آدرس'])

@endsection