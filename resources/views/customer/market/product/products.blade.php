@extends('customer.layouts.master-one-col')

@section('haed-tag')
<link rel="stylesheet" href="{{ asset('customer-assets/css/product.css') }}">
<meta name="robots" content="index, follow">

<title>{{ request()->search ? 'نتایج ' . request()->search : ($hasCategoryName ? 'محصولات دسته ' . $hasCategoryName : 'محصولات' )}} | {{$setting->title}}</title>
@endsection

@php
/// set product filters in array for easy route access
$filtersArray = [];
(request()->search) ? ($filtersArray['search'] = request()->search) : null;
(request()->sort) ? ($filtersArray['sort'] = request()->sort) : null;
(request()->category) ? ($filtersArray['category'] = request()->category->id) : null;
(request()->brands) ? ($filtersArray['brands'] = request()->brands) : null;
(request()->fltr_search)? ($filtersArray['fltr_search'] = request()->fltr_search) : null;
(request()->min_price) ? ($filtersArray['min_price'] = request()->min_price) : null;
(request()->max_price) ? ($filtersArray['max_price'] = request()->max_price) : null;
@endphp

@section('content')
<!-- for product seo research engine -->
<h1 class="d-none">{{ request()->search ? request()->search : ($hasCategoryName ? 'محصولات دسته ' . $hasCategoryName : 'محصولات' )}}</h1>
<section class="">
    <section id="main-body-two-col" class="container-xxl body-container">
        <section class="row">
            @include('customer.layouts.partials.product-filter-sidebar')
            <main id="main-body" class="main-body col-md-9">
                <section class="content-wrapper bg-white p-3 rounded-2 mb-2">
                    <section class="filters mb-3 d-flex justify-content-between">
                        <section>
                            @isset(request()->search)
                            <span class="d-inline-block border p-1 rounded bg-light">نتیجه جستجو برای : <span class="badge bg-info text-dark">"{{ request()->search }}"</span></span>
                            @endisset

                            @if(!empty($selectedBrandsArray))
                            <span class="d-inline-block border p-1 rounded bg-light">برند : <span class="badge bg-info text-dark">"{{ implode('", "' , $selectedBrandsArray )}}"</span></span>
                            @endif

                            @isset($hasCategoryName)
                            <span class="d-inline-block border p-1 rounded bg-light">دسته : <span class="badge bg-info text-dark">"{{ $hasCategoryName }}"</span></span>
                            @endisset

                            @isset(request()->min_price)
                            <span class="d-inline-block border p-1 rounded bg-light">قیمت از : <span class="badge bg-info text-dark">"{{ number_format(request()->min_price). " تومان" }}"</span></span>
                            @endisset

                            @isset(request()->max_price)
                            <span class="d-inline-block border p-1 rounded bg-light">قیمت تا : <span class="badge bg-info text-dark">"{{ number_format(request()->max_price). " تومان" }}"</span></span>
                            @endisset

                            @isset(request()->fltr_search)
                            <span class="d-inline-block border p-1 rounded bg-light">جستجو در نتایج : <span class="badge bg-info text-dark">"{{ request()->fltr_search }}"</span></span>
                            @endisset
                        </section>
                        @if($filtersArray)
                        <section>
                            <a href="{{ route('customer.market.products') }}" class="btn btn-sm btn-danger"> <i class="fa fa-times fa-sm"></i> حذف فیلتر </a>
                        </section>
                        @endif
                    </section>
                    <section class="sort ">
                        <span>مرتب سازی بر اساس : </span>
                        @php $filtersArray['sort'] = 24; @endphp
                        <a href="{{ route('customer.market.products', $filtersArray) }}" class="btn {{ isset(request()->sort) ? (request()->sort == 24 ? 'btn-info' : 'btn-light') : 'btn-info' }} btn-sm px-1 py-0" type="button">جدیدترین</a>
                        @php $filtersArray['sort'] = 84; @endphp
                        <a href="{{ route('customer.market.products', $filtersArray) }}" class="btn {{ isset(request()->sort) && request()->sort == 84 ? 'btn-info' : 'btn-light' }} btn-sm px-1 py-0" type="button">محبوب ترین</a>
                        @php $filtersArray['sort'] = 34; @endphp
                        <a href="{{ route('customer.market.products', $filtersArray) }}" class="btn {{ isset(request()->sort) && request()->sort == 34 ? 'btn-info' : 'btn-light' }} btn-sm px-1 py-0" type="button">گران ترین</a>
                        @php $filtersArray['sort'] = 12; @endphp
                        <a href="{{ route('customer.market.products', $filtersArray) }}" class="btn {{ isset(request()->sort) && request()->sort == 12 ? 'btn-info' : 'btn-light' }} btn-sm px-1 py-0" type="button">ارزان ترین</a>
                        @php $filtersArray['sort'] = 62; @endphp
                        <a href="{{ route('customer.market.products', $filtersArray) }}" class="btn {{ isset(request()->sort) && request()->sort == 62 ? 'btn-info' : 'btn-light' }} btn-sm px-1 py-0" type="button">پربازدیدترین</a>
                        @php $filtersArray['sort'] = 47; @endphp
                        <a href="{{ route('customer.market.products', $filtersArray) }}" class="btn {{ isset(request()->sort) && request()->sort == 47 ? 'btn-info' : 'btn-light' }} btn-sm px-1 py-0" type="button">پرفروش ترین</a>
                    </section>


                    <section class="main-product-wrapper row my-4">

                        @forelse ($products as $product)
                        <section class="col-md-3 p-0">
                            <section class="product">
                                <!-- start product add to cart button -->
                                <section class="product-add-to-cart"><button class="btn btn-sm text-decoration-none" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></button></section>
                                <!-- end product add to cart button -->

                                <!-- start product add to favorite button -->
                                @guest
                                <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $product)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                @endguest
                                @auth
                                @if ($product->user->contains(auth()->user()->id))
                                <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $product)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="حذف از علاقه مندی"><i class="fa fa-heart text-danger"></i></a></section>
                                @else
                                <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $product)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                @endif
                                @endauth
                                <!-- end product add to favorite button -->

                                <!-- start product show detail link -->
                                <a class="product-link" target="_blank" href="{{ route('customer.market.product', $product) }}">

                                    <!-- start product image section -->
                                    <section class="product-image">
                                        <img class="" src="{{ hasFileUpload($product->image['indexArray'][$product->image['currentImage']]) }}" alt="{{$product->name}}">
                                    </section>
                                    <!-- end product image section -->

                                    <section class="product-colors"></section>

                                    <!-- start product name section -->
                                    <section class="product-name">
                                        <h3 title="{{$product->name}}">{{ Str::limit($product->name , 30)}}</h3>
                                    </section>
                                    <!-- end product name section -->

                                    <!-- start product prices section (old price, amazing sale percentage, final price) -->
                                    <section class="product-price-wrapper">
                                        @php
                                        $amazingSale = $product->activeAmazingSales();
                                        $product_color = $product->activeColors()->first();
                                        $guarantee = $product->activeGuarantees()->first();
                                        @endphp

                                        @if ($amazingSale)
                                        <section class="product-discount">
                                            <span class="product-old-price">{{ number_format($product->price) }}</span>
                                            <span class="product-discount-amount">{{ $amazingSale->percentage }}%</span>
                                        </section>
                                        @endif
                                        <section class="product-price">
                                            {{ number_format($product->showFinalPrice()) }} تومان
                                        </section>
                                    </section>
                                    <!-- end product prices section (old price, amazing sale percentage, final price) -->

                                    <!-- start product colors section -->
                                    @isset($product->colors)
                                    <section class="product-colors">
                                        @foreach ($product->activeColors() as $color)
                                        <section class="product-colors-item" style="background-color: {{$color->color}}"></section>
                                        @endforeach
                                    </section>
                                    @endisset
                                    <!-- end product colors section -->

                                </a>
                                <!-- start product show detail link -->
                            </section>
                        </section>
                        @empty
                        <section class="col-12">
                            <section class="my-4 d-flex justify-content-center">
                                <strong>محصولی یافت نشد</strong>
                            </section>
                        </section>
                        @endforelse
                        <section class="my-4 d-flex justify-content-center border-0">
                            <nav>
                                {{ $products->links('pagination::bootstrap-5') }}
                            </nav>
                        </section>

                    </section>
                </section>
            </main>
        </section>
    </section>
</section>
@endsection
@section('script')

@include('customer.alerts.sweetalert.success')
@include('customer.alerts.sweetalert.error')

@endsection