@extends('customer.layouts.master-two-col')

@section('haed-tag')
<title></title>
@endsection

@section('content')
<section class="content-wrapper bg-white p-3 rounded-2 mb-2">

    <!-- start vontent header -->
    <section class="content-header mb-4">
        <section class="d-flex justify-content-between align-items-center">
            <h2 class="content-header-title">
                <span>آدرس های من</span>
            </h2>
        </section>
    </section>
    <!-- end vontent header -->



    <section class="my-addresses">

        @foreach ($addresses as $address)
        <section class="my-address-wrapper mb-2 p-2">
            <section class="mb-2">
                <i class="fa fa-map-marker-alt mx-1"></i>
                آدرس : {{$address->fullAddress()}}
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
            <a class="" href="{{route('customer.profile.address.edit-address', $address->id)}}"><i class="fa fa-edit"></i> ویرایش آدرس</a>
            <form id="delete-address-{{$address->id}}" action="{{route('customer.profile.address.destroy-address', $address->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" style="top:38%;" class="delete"><i class="fa fa-trash"></i> حذف آدرس</button>
            </form>
        </section>
        @endforeach

        <section class="address-add-wrapper">
            <button class="address-add-button" type="button" data-bs-toggle="modal" data-bs-target="#add-address"><i class="fa fa-plus"></i> ایجاد آدرس جدید</button>
        </section>
    </section>
</section>
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