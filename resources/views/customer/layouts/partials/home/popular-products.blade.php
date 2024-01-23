<section class="py-4">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <section class="content-wrapper bg-white p-3 rounded-2">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>محبوب ترین کالاها</span>
                            </h2>
                            <section class="content-header-link">
                                <a target="_blank" href="{{ route('customer.market.products', ['sort' => 84]) }}">مشاهده همه</a>
                            </section>
                        </section>
                    </section>
                    <!-- start vontent header -->
                    <section class="lazyload-wrapper">
                        <section class="lazyload light-owl-nav owl-carousel owl-theme">
                            @foreach ($popularProducts as $popularProduct)
                            <section class="item">
                                <section class="lazyload-item-wrapper">
                                    <section class="product">
                                        <!-- add to cart button srea -->
                                        @include('customer.layouts.partials.card.add-to-cart', ['product' => $popularProduct])
                                        <!-- add to cart button srea -->
                                        @guest
                                        <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $popularProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                        @endguest
                                        @auth
                                        @if ($popularProduct->user->contains(auth()->user()->id))
                                        <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $popularProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="حذف از علاقه مندی"><i class="fa fa-heart text-danger"></i></a></section>
                                        @else
                                        <section class="product-add-to-favorite"><button class="btn btn-sm text-decoration-none " type="button" data-url="{{route('customer.add-to-favorite', $popularProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                        @endif
                                        @endauth

                                        <a class="product-link" target="_blank" href="{{ route('customer.market.product', $popularProduct) }}">
                                            <section class="product-image">
                                                <img class="" src="{{ hasFileUpload($popularProduct->image['indexArray'][$popularProduct->image['currentImage']]) }}" alt="{{$popularProduct->name}}">
                                            </section>
                                            <section class="product-colors"></section>
                                            <section class="product-name">
                                                <h3 title="{{$popularProduct->name}}">{{ Str::limit($popularProduct->name , 30)}}</h3>
                                            </section>
                                            <section class="product-price-wrapper">
                                                @php
                                                $amazingSale = $popularProduct->activeAmazingSales();
                                                $product_color = $popularProduct->activeColors()->first();
                                                $guarantee = $popularProduct->activeGuarantees()->first();
                                                @endphp

                                                @if ($amazingSale)
                                                <section class="product-discount">
                                                    <span class="product-old-price">{{ number_format($popularProduct->price) }}</span>
                                                    <span class="product-discount-amount">{{ $amazingSale->percentage }}%</span>
                                                </section>
                                                @endif
                                                <section class="product-price">
                                                    {{ number_format($popularProduct->showFinalPrice()) }} تومان
                                                </section>
                                            </section>
                                            @isset($popularProduct->colors)
                                            <section class="product-colors">
                                                @foreach ($popularProduct->activeColors() as $color)
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