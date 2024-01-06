@extends('customer.layouts.master-one-col')

@section('haed-tag')
<title></title>
@endsection

@section('content')
<!-- for SEO  -->
<h1 class="d-none">دیجی کالا</h1>
<!-- start slideshow -->
<section class="container-xxl my-4">
    <section class="row">
        <section class="col-md-8 pe-md-1 ">
            <section id="slideshow" class="owl-carousel owl-theme">
                @forelse ( $slideShowImages as $slideShowImage)
                <section class="item"><a class="w-100 d-block h-auto text-decoration-none" target="_blank" href="{{ urldecode($slideShowImage->url) }}"><img class="w-100 rounded-2 d-block h-auto" src="{{ asset($slideShowImage->image) }}" alt="{{ $slideShowImage->title }}"></a></section>
                @empty
                <section class="item"><a class="w-100 d-block h-auto text-decoration-none" target="_blank" href="#"><img class="w-100 rounded-2 d-block h-auto" src="{{ asset('customer-assets/images/slideshow/6.gif') }}" alt="تصویر پیش فرض"></a></section>
                @endforelse
            </section>
        </section>

        <section class="col-md-4 ps-md-1 mt-2 mt-md-0">
            @forelse ( $topBanners as $topBanner)
            <section class="mb-2"><a target="_blank" href="{{ urldecode($topBanner->url) }}" class="d-block"><img class="w-100 rounded-2" src="{{ asset($topBanner->image) }}" alt="{{ $topBanner->title }}"></a></section>
            @empty
            <section class="mb-2"><a target="_blank" href="#" class="d-block"><img class="w-100 rounded-2" src="{{ asset('customer-assets/images/slideshow/11.jpg') }}" alt="تصویر پیش فرض"></a></section>
            @endforelse
        </section>
    </section>
</section>
<!-- end slideshow -->
@isset($mostVisitedProducts)
<!-- start product lazy load -->
<section class="mb-3">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <section class="content-wrapper bg-white p-3 rounded-2">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>پربازدیدترین کالاها</span>
                            </h2>
                            <section class="content-header-link">
                                <a target="_blank" href="#">مشاهده همه</a>
                            </section>
                        </section>
                    </section>
                    <!-- start vontent header -->
                    <section class="lazyload-wrapper">
                        <section class="lazyload light-owl-nav owl-carousel owl-theme">
                            @foreach ($mostVisitedProducts as $mostVisitedProduct)
                            <section class="item">
                                <section class="lazyload-item-wrapper">
                                    <section class="product">
                                        <section class="product-add-to-cart"><button class="btn btn-sm text-decoration-none add-to-favorite" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                        @guest
                                        <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $mostVisitedProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                        @endguest
                                        @auth
                                        @if ($mostVisitedProduct->user->contains(auth()->user()->id))
                                        <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $mostVisitedProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="حذف از علاقه مندی"><i class="fa fa-heart text-danger"></i></a></section>
                                        @else
                                        <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $mostVisitedProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                        @endif
                                        @endauth

                                        <a class="product-link" target="_blank" href="{{ route('customer.market.product', $mostVisitedProduct) }}">
                                            <section class="product-image">
                                                <img class="" src="{{ asset($mostVisitedProduct->image['indexArray'][$mostVisitedProduct->image['currentImage']]) }}" alt="{{$mostVisitedProduct->name}}">
                                            </section>
                                            <section class="product-colors"></section>
                                            <section class="product-name">
                                                <h3 title="{{$mostVisitedProduct->name}}">{{ Str::limit($mostVisitedProduct->name , 30)}}</h3>
                                            </section>
                                            <section class="product-price-wrapper">
                                                @php
                                                $amazingSale = $mostVisitedProduct->activeAmazingSales();
                                                $product_color = $mostVisitedProduct->activeColors()->first();
                                                $guarantee = $mostVisitedProduct->activeGuarantees()->first();
                                                @endphp

                                                @if ($amazingSale)
                                                <section class="product-discount">
                                                    <span class="product-old-price">{{ number_format($mostVisitedProduct->price) }}</span>
                                                    <span class="product-discount-amount">{{ $amazingSale->percentage }}%</span>
                                                </section>
                                                @endif
                                                <section class="product-price">
                                                    {{ number_format($mostVisitedProduct->showFinalPrice()) }} تومان
                                                </section>
                                            </section>
                                            @isset($mostVisitedProduct->colors)
                                            <section class="product-colors">
                                                @foreach ($mostVisitedProduct->activeColors() as $color)
                                                <section class="product-colors-item" style="background-color: {{$color->color}}"></section>
                                                @endforeach
                                            </section>
                                            @endisset

                                        </a>
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
<!-- end product lazy load -->
@endisset

@isset($middleBanners)
<!-- start ads section -->
<section class="mb-3">
    <section class="container-xxl">
        <!-- two column-->
        <section class="row py-4">
            @foreach ( $middleBanners as $middleBanner)
            <section class="col-12 col-md-6 mt-2 mt-md-0"><a target="_blank" href="{{ urldecode($middleBanner->url) }}"><img class="d-block rounded-2 w-100" src="{{ asset($middleBanner->image) }}" alt="{{ $middleBanner->title }}"></a></section>
            @endforeach
        </section>

    </section>
</section>
<!-- end ads section -->
@endisset

@isset($offerProducts)
<!-- start product lazy load -->
<section class="mb-3">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <section class="content-wrapper bg-white p-3 rounded-2">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>پیشنهاد آمازون به شما</span>
                            </h2>
                            <section class="content-header-link">
                                <a target="_blank" href="#">مشاهده همه</a>
                            </section>
                        </section>
                    </section>
                    <!-- start vontent header -->
                    <section class="lazyload-wrapper">
                        <section class="lazyload light-owl-nav owl-carousel owl-theme">
                            @foreach ($offerProducts as $offerProduct)
                            <section class="item">
                                <section class="lazyload-item-wrapper">
                                    <section class="product">
                                        <section class="product-add-to-cart"><button class="btn btn-sm text-decoration-none add-to-favorite" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                        @guest
                                        <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $offerProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                        @endguest
                                        @auth
                                        @if ($offerProduct->user->contains(auth()->user()->id))
                                        <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $offerProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="حذف از علاقه مندی"><i class="fa fa-heart text-danger"></i></a></section>
                                        @else
                                        <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $offerProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                        @endif
                                        @endauth

                                        <a class="product-link" target="_blank" href="{{ route('customer.market.product', $offerProduct) }}">
                                            <section class="product-image">
                                                <img class="" src="{{ asset($offerProduct->image['indexArray'][$offerProduct->image['currentImage']]) }}" alt="{{$offerProduct->name}}">
                                            </section>
                                            <section class="product-colors"></section>
                                            <section class="product-name">
                                                <h3 title="{{$offerProduct->name}}">{{ Str::limit($offerProduct->name , 30)}}</h3>
                                            </section>
                                            <section class="product-price-wrapper">
                                                @php
                                                $amazingSale = $offerProduct->activeAmazingSales();
                                                $product_color = $offerProduct->activeColors()->first();
                                                $guarantee = $offerProduct->activeGuarantees()->first();
                                                @endphp

                                                @if ($amazingSale)
                                                <section class="product-discount">
                                                    <span class="product-old-price">{{ number_format($offerProduct->price) }}</span>
                                                    <span class="product-discount-amount">{{ $amazingSale->percentage }}%</span>
                                                </section>
                                                @endif
                                                <section class="product-price">
                                                    {{ number_format($offerProduct->showFinalPrice()) }} تومان
                                                </section>
                                            </section>
                                            @isset($offerProduct->colors)
                                            <section class="product-colors">
                                                @foreach ($offerProduct->activeColors() as $color)
                                                <section class="product-colors-item" style="background-color: {{$color->color}}"></section>
                                                @endforeach
                                            </section>
                                            @endisset

                                        </a>
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
<!-- end product lazy load -->
@endisset


@isset($bottomBanner)
<!-- start ads section -->
<section class="mb-3">
    <section class="container-xxl">
        <!-- one column -->
        <section class="row py-4">
            <section class="col"><a target="_blank" href="{{ urldecode($middleBanner->url) }}"><img class="d-block rounded-2 w-100" src="{{ asset($bottomBanner->image) }}" alt="{{ $bottomBanner->title }}"></a></section>
        </section>
    </section>
</section>
<!-- end ads section -->
@endisset

@isset($brands)
<!-- start brand part-->
<section class="brand-part mb-4 py-4">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <!-- start vontent header -->
                <section class="content-header">
                    <section class="d-flex align-items-center">
                        <h2 class="content-header-title">
                            <span>برندهای ویژه</span>
                        </h2>
                    </section>
                </section>
                <!-- start vontent header -->
                <section class="brands-wrapper py-4">
                    <section class="brands dark-owl-nav owl-carousel owl-theme">
                        @foreach ( $brands as $brand )
                        <section class="item">
                            <section class="brand-item">
                                <a target="_blank" href="#"><img class="rounded-2" src="{{ asset($brand->logo) }}" alt="{{$brand->orginal_name}}"></a>
                            </section>
                        </section>
                        @endforeach
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>
<!-- end brand part-->
@endisset

@endsection