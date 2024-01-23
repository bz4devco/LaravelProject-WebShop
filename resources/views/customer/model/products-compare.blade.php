<!-- start add address Modal -->
<section class="modal  fade" id="addToCompareModal" tabindex="-1" aria-labelledby="add-address-label" aria-hidden="true">
    <section class="modal-dialog modal-xl modal-dialog-centered">
        <section class="modal-content">
            <section class="modal-header">
                <h5 class="modal-title" id="add-address-label"><i class="fas fa-plus"></i> افزودن محصول به لیست مقایسه</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </section>
            <section class="modal-body">
                <section class="main-product-wrapper row my-4">
                    @forelse ($products as $product)
                    <section class="col-md-3 p-0">
                        <section class="product">
                            <!-- start product show detail link -->
                            <a class="product-link" href="{{ route('customer.market.add-to-compare', $product) }}">

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
                </section>
            </section>
        </section>
    </section>
</section>
<!-- end add address Modal -->