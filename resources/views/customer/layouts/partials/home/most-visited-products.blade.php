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
                                <a target="_blank" href="{{ route('customer.market.products', ['sort' => 62]) }}">مشاهده همه</a>
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
                                        <!-- add to cart button srea -->
                                        @include('customer.layouts.partials.card.add-to-cart', ['product' => $mostVisitedProduct])
                                        <!-- add to cart button srea -->
                                        @guest
                                        <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $mostVisitedProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></button></section>
                                        @endguest
                                        @auth
                                        @if ($mostVisitedProduct->user->contains(auth()->user()->id))
                                        <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $mostVisitedProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="حذف از علاقه مندی"><i class="fa fa-heart text-danger"></i></button></section>
                                        @else
                                        <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $mostVisitedProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></button></section>
                                        @endif
                                        @endauth

                                        <a class="product-link" target="_blank" href="{{ route('customer.market.product', $mostVisitedProduct) }}">
                                            <section class="product-image">
                                                <img class="" src="{{ hasFileUpload($mostVisitedProduct->image['indexArray'][$mostVisitedProduct->image['currentImage']]) }}" alt="{{$mostVisitedProduct->name}}">
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