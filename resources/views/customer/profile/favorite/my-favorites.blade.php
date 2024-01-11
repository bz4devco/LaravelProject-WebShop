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
                <span>لیست علاقه های من</span>
            </h2>

        </section>
    </section>
    <!-- end vontent header -->

    @forelse(auth()->user()->products as $product)
    <section class="cart-item d-flex py-3">
        <section class="cart-img align-self-start flex-shrink-1">
            <a class="text-decoration-none text-dark" href="{{ route('customer.market.product', $product)}}" target="_blank">
                <img src="{{ asset($product->image['indexArray'][$product->image['currentImage']]) }}" alt="{{$product->name}}">
            </a>
        </section>
        <section class="align-self-start w-100">
            <a class="text-decoration-none text-dark" href="{{ route('customer.market.product', $product)}}" target="_blank">
                <p class="fw-bold">{{$product->name}}</p>
            </a>
            @if ($product->marketable_number > 0)
            <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span></p>
            @else
            <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا ناموجود</span></p>
            @endif
            <section>
                <a class="text-decoration-none cart-delete" href="{{ route('customer.profile.favorite.destroy-favorites', $product->id) }}"><i class="fa fa-trash-alt"></i> حذف از لیست علاقه ها</a>
            </section>
        </section>
        <section class="align-self-end flex-shrink-1">
            <section class="text-nowrap fw-bold">{{ $product->marketable_number > 0 ? number_format($product->showFinalPrice()) : 'کالا نا موجود' }} تومان</section>
        </section>
    </section>
    @empty
    <section class="cart-item d-flex py-5 justify-content-center">
        <strong>لیست علاقه مندی های شما خالی می باشد</strong>
    </section>
    @endforelse

</section>
@endsection
@section('script')

@include('customer.alerts.sweetalert.success')
@include('customer.alerts.sweetalert.error')

@endsection