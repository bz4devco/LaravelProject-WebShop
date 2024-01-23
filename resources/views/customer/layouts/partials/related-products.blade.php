@if($relatedProducts->count() > 0)
<section class="mb-4">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <section class="content-wrapper bg-white p-3 rounded-2">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>کالاهای مرتبط</span>
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
                                        @guest
                                        <section class="product-add-to-cart"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $relatedProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                        @endguest
                                        @auth
                                        <section class="product-add-to-cart"><button class="btn btn-sm text-decoration-none" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></button></section>
                                        @endauth

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
                                        <a class="product-link" target="_blank" href="{{ route('customer.market.product', $relatedProduct) }}">

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
                    <!-- end vontent header -->
                </section>
            </section>
        </section>
    </section>
</section>
@endif