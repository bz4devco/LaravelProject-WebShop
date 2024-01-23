@extends('customer.layouts.master-one-col')

@section('haed-tag')
<link rel="stylesheet" href="{{ asset('customer-assets/css/cart.css') }}">
<meta name="robots" content="index, nofollow">

<title>سبد خرید | {{$setting->title}}</title>
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
                            <span>سبد خرید شما</span>
                        </h2>

                    </section>
                </section>

                <section class="row mt-4">
                    @if($cartItems->count() > 0)
                    <section class="col-md-9 mb-3">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <form id="cart-items" method="post">
                                @csrf

                                @php
                                $totalProductPrice = 0;
                                $totalDiscount = 0
                                @endphp

                                @foreach ($cartItems as $cartItem)

                                @php
                                $totalProductPrice += $cartItem->cartItemProductPrice() * $cartItem->number;
                                $totalDiscount += $cartItem->cartItemProductDiscount() * $cartItem->number;
                                @endphp

                                <section class="cart-item d-md-flex py-3">
                                    <section class="cart-img align-self-start flex-shrink-1">
                                        <img src="{{ hasFileUpload($cartItem->product->image['indexArray'][$cartItem->product->image['currentImage']]) }}" alt="{{$cartItem->product->name}}">
                                    </section>
                                    <section class="align-self-start w-100">
                                        <p class="fw-bold">{{ $cartItem->product->name }}</p>
                                        @isset($cartItem->color)
                                        <p><span style="background-color: {{$cartItem->color->color}}" class="cart-product-selected-color me-1"></span> <span> {{ $cartItem->color->name }}</span></p>
                                        @endisset
                                        @isset($cartItem->guarantee)
                                        <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i> <span> {{ $cartItem->guarantee->name ?? "گارانتی اصالت و سلامت فیزیکی کالا"}}</span></p>
                                        @endisset

                                        @if ($cartItem->product->marketable_number > 0)
                                        <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span></p>
                                        @else
                                        <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا ناموجود</span></p>
                                        @endif
                                        <section>
                                            <section class="cart-product-number d-inline-block ">
                                                <button class="cart-number cart-number-down" type="button">-</button>
                                                <input class="number" name="number[{{$cartItem->id}}]" data-product-price="{{number_format($cartItem->cartItemProductPrice())}}" data-product-discount="{{number_format($cartItem->cartItemProductDiscount())}}" type="number" min="1" max="{{ $cartItem->product->marketable_number }}" step="1" value="{{ $cartItem->number }}" readonly="readonly">
                                                <button class="cart-number cart-number-up" type="button">+</button>
                                            </section>
                                            <a class="text-decoration-none ms-4 cart-delete" href="{{ route('customer.sales-process.remove-from-cart', $cartItem->id) }}"><i class="fa fa-trash-alt"></i> حذف از سبد</a>
                                        </section>
                                    </section>
                                    <section class="align-self-end flex-shrink-1">
                                        @if(!empty($cartItem->product->activeAmazingSales()))
                                        <section class="cart-item-discount text-danger text-nowrap mb-1">تخفیف {{number_format($cartItem->cartItemProductDiscount() * $cartItem->number) }}</section>
                                        @endif
                                        <section class="text-nowrap fw-bold">{{number_format($cartItem->cartItemProductPrice() * $cartItem->number)}} تومان</section>
                                    </section>
                                </section>
                                @endforeach
                            </form>
                        </section>
                    </section>
                    <section class="col-md-3">
                        <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">قیمت کالاها ({{$cartItem->count()}})</p>
                                <p class="text-muted" id="total-product-price">{{number_format($totalProductPrice)}} تومان</p>
                            </section>

                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">تخفیف کالاها</p>
                                <p class="text-danger fw-bolder" id="total-product-discount">{{number_format($totalDiscount)}} تومان</p>
                            </section>
                            <section class="border-bottom mb-3"></section>
                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">جمع سبد خرید</p>
                                <p class="fw-bolder" id="total-price">{{number_format($totalProductPrice - $totalDiscount)}} تومان</p>
                            </section>

                            <p class="my-3">
                                <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد.
                            </p>


                            <section class="">
                                <button onclick="document.getElementById('cart-items').submit()" class="btn btn-danger d-block">تکمیل فرآیند خرید</buttonref=>
                            </section>

                        </section>
                    </section>
                    @else
                    <section class="col-12">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <p class="py-5 text-center">
                                <strong>سبد خرید شما خالی می باشد</strong>
                            </p>
                        </section>
                    </section>
                    @endif
                </section>
            </section>
        </section>

    </section>
</section>
<!-- end cart -->


<section class="mb-4">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <section class="content-wrapper bg-white p-3 rounded-2">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>کالاهای مرتبط با سبد خرید شما</span>
                            </h2>
                        </section>
                    </section>
                    <!-- start vontent header -->
                    <section class="lazyload-wrapper">
                        <section class="lazyload light-owl-nav owl-carousel owl-theme">
                            @foreach ($relatedProducts as $relatedProduct)
                            <section class="item">
                                <section class="lazyload-item-wrapper">
                                    <section class="product">
                                        <!-- start product add to cart button -->
                                        <section class="product-add-to-cart"><button class="btn btn-sm text-decoration-none" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></button></section>
                                        <!-- end product add to cart button -->

                                        <!-- start product add to favorite button -->
                                        @guest
                                        <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $relatedProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                        @endguest
                                        @auth
                                        @if ($relatedProduct->user->contains(auth()->user()->id))
                                        <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $relatedProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="حذف از علاقه مندی"><i class="fa fa-heart text-danger"></i></a></section>
                                        @else
                                        <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $relatedProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                        @endif
                                        @endauth
                                        <!-- end product add to favorite button -->

                                        <!-- start product show detail link -->
                                        <a class="product-link"  target="_blank" href="{{ route('customer.market.product', $relatedProduct) }}">

                                            <!-- start product image section -->
                                            <section class="product-image">
                                                <img class="" src="{{ hasFileUpload($relatedProduct->image['indexArray'][$relatedProduct->image['currentImage']]) }}" alt="{{$relatedProduct->name}}">
                                            </section>
                                            <!-- end product image section -->

                                            <section class="product-colors"></section>

                                            <!-- start product name section -->
                                            <section class="product-name">
                                                <h3 title="{{$relatedProduct->name}}">{{ Str::limit($relatedProduct->name , 30)}}</h3>
                                            </section>
                                            <!-- end product name section -->

                                            <!-- start product prices section (old price, amazing sale percentage, final price) -->
                                            <section class="product-price-wrapper">
                                                @php
                                                $amazingSale = $relatedProduct->activeAmazingSales();
                                                $product_color = $relatedProduct->activeColors()->first();
                                                $guarantee = $relatedProduct->activeGuarantees()->first();
                                                @endphp

                                                @if ($amazingSale)
                                                <section class="product-discount">
                                                    <span class="product-old-price">{{ number_format($relatedProduct->price) }}</span>
                                                    <span class="product-discount-amount">{{ $amazingSale->percentage }}%</span>
                                                </section>
                                                @endif
                                                <section class="product-price">
                                                    {{ number_format($relatedProduct->showFinalPrice()) }} تومان
                                                </section>
                                            </section>
                                            <!-- end product prices section (old price, amazing sale percentage, final price) -->

                                            <!-- start product colors section -->
                                            @isset($relatedProduct->colors)
                                            <section class="product-colors">
                                                @foreach ($relatedProduct->activeColors() as $color)
                                                <section class="product-colors-item" style="background-color: {{$color->color}}"></section>
                                                @endforeach
                                            </section>
                                            @endisset
                                            <!-- end product colors section -->

                                        </a>
                                        <!-- start product show detail link -->
                                    </section>
                                </section>
                            </section>
                            @endforeach
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>
@endsection
@section('script')

<script src="{{ asset('customer-assets/js/pages/cart.js') }}"></script>

@include('customer.alerts.sweetalert.success')
@include('customer.alerts.sweetalert.error')

@endsection