<section class="mb-3">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <section class="content-wrapper bg-white p-3 rounded-2">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>پیشنهاد {{$setting->title}} به شما</span>
                            </h2>
                            <section class="content-header-link">
                                <a target="_blank" href="{{ route('customer.market.products', ['sort' => 47]) }}">مشاهده همه</a>
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
                                        <!-- add to cart button srea -->
                                        @include('customer.layouts.partials.card.add-to-cart', ['product' => $offerProduct])
                                        <!-- add to cart button srea -->
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
                                                <img class="" src="{{ hasFileUpload($offerProduct->image['indexArray'][$offerProduct->image['currentImage']]) }}" alt="{{$offerProduct->name}}">
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