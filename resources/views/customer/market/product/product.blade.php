@extends('customer.layouts.master-one-col')

@section('haed-tag')
<link rel="stylesheet" href="{{ asset('customer-assets/css/product.css') }}">

<title>{{$product->name}}</title>
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
                            <span>{{$product->name}}</span>
                        </h2>
                    </section>
                </section>

                <section class="row mt-4">
                    <!-- start image gallery -->
                    <section class="col-md-4">
                        <section class="content-wrapper bg-white p-3 rounded-2 mb-4">
                            <section class="product-gallery">
                                <section class="product-gallery-selected-image mb-3">
                                    <img src="{{ asset($product->image['indexArray']['large']) }}" alt="">
                                </section>
                                <section class="product-gallery-thumbs">
                                    <img class="product-gallery-thumb" src="{{ asset($product->image['indexArray']['small']) }}" alt="{{$product->name}}" data-input="{{ asset($product->image['indexArray']['large']) }}">
                                    @forelse($product->gallerys as $gallery)
                                    <img class="product-gallery-thumb" src="{{ asset($gallery->image['indexArray']['small']) }}" alt="{{$product->name}}" data-input="{{ asset($gallery->image['indexArray']['large']) }}">
                                    @empty
                                    @endforelse
                                </section>
                            </section>
                        </section>
                    </section>
                    <!-- end image gallery -->

                    <!-- start product info -->
                    <section class="col-md-5">
                        <form action="{{ route('customer.sales-process.add-to-cart', $product) }}" method="post">
                            @csrf
                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            {{$product->name}}
                                        </h2>
                                    </section>
                                </section>

                                <section class="product-info">
                                    <!-- start select color -->
                                    @isset($product->colors)
                                    <p><span>رنگ انتخاب شده : <span id="selected_color_name">{{$product->colors->first()->name}}</span></span></p>
                                    <p>
                                        @foreach ($product->activeColors() as $color)
                                        <input type="radio" name="color" id="color-{{$color->id}}" class="d-none" value="{{ $color->id }}" data-color-name="{{ $color->name }}" data-product-color-price="{{ number_format($color->price_increase) }}" @if($loop->iteration == 1) checked @endif>
                                        <label for="color-{{$color->id}}" style="background-color: {{$color->color ?? '#ffffff'}}; cursor: pointer;" class="product-info-colors me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$color->name}}"></label>
                                        @endforeach
                                    </p>
                                    @endisset
                                    <!-- end select color -->

                                    <!-- /////////////////////////////////// -->

                                    <!-- start guarantees -->
                                    @isset($product->guarantees)
                                    <section class="row mb-2">
                                        <section class="col-2 mt-1 pe-0">
                                            <i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                            <span>
                                                گارانتی:
                                            </span>
                                        </section>
                                        <section class="col-4 ps-0">
                                            <select name="guarantee" id="guarantee" class="form-select form-select-sm">
                                                @foreach ( $product->activeGuarantees() as $guarantee)
                                                <option value="{{ $guarantee->id }}" data-product-guarantee-price="{{ number_format($guarantee->price_increase) }}" @if($loop->iteration == 1) checked @endif>{{ $guarantee->name }}</option>
                                                @endforeach
                                            </select>
                                        </section>
                                    </section>
                                    @else
                                    <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i> <span> گارانتی اصالت و سلامت فیزیکی کالا</span></p>
                                    @endisset
                                    <!-- end guarantees -->

                                    <!-- /////////////////////////////////// -->

                                    <!-- start marketable product -->
                                    @if ($product->marketable_number > 0)
                                    <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span></p>
                                    @else
                                    <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا ناموجود</span></p>
                                    @endif
                                    <!-- start marketable product -->

                                    <!-- /////////////////////////////////// -->

                                    <!-- start add to favorite button -->
                                    @guest
                                    <p class="add-to-favorite-btn">
                                        <button type="button" class="btn btn-light  btn-sm text-decoration-none" data-url="{{route('customer.add-to-favorite', $product)}}">
                                            <i class="fa fa-heart text-danger"></i> افزودن به علاقه مندی
                                        </button>
                                    </p>
                                    @endguest
                                    @auth
                                    @if ($product->user->contains(auth()->user()->id))
                                    <p class="add-to-favorite-btn">
                                        <button type="button" class="btn btn-light  btn-sm text-decoration-none" data-url="{{route('customer.add-to-favorite', $product)}}">
                                            <i class="fa fa-heart"></i> حذف به علاقه مندی
                                        </button>
                                    </p>
                                    @else
                                    <p class="add-to-favorite-btn">
                                        <button type="button" class="btn btn-light  btn-sm text-decoration-none" data-url="{{route('customer.add-to-favorite', $product)}}">
                                            <i class="fa fa-heart text-danger"></i> افزودن به علاقه مندی
                                        </button>
                                    </p>
                                    @endif
                                    @endauth
                                    <!-- end add to favorite button -->

                                    <!-- /////////////////////////////////// -->

                                    <!-- start choose number of product -->
                                    <section>
                                        <section class="cart-product-number d-inline-block ">
                                            <button class="cart-number cart-number-down" type="button">-</button>
                                            <input id="number" name="number" type="number" min="1" max="{{ $product->marketable_number }}" step="1" value="{{ $product->marketable_number == 0 ? 0 : 1 }}" readonly="readonly">
                                            <button class="cart-number cart-number-up" type="button">+</button>
                                        </section>
                                    </section>
                                    <!-- end choose number of product -->

                                    <!-- /////////////////////////////////// -->

                                    <!-- start descrition of buy rules product from this website -->
                                    <p class="mb-3 mt-5">
                                        <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد. پس از ثبت سفارش کالا بر اساس نحوه ارسال که شما انتخاب کرده اید کالا برای شما در مدت زمان مذکور ارسال می گردد.
                                    </p>
                                    <!-- end descrition of buy rules product from this website -->
                                </section>
                            </section>

                    </section>
                    <!-- end product info -->

                    <!-- start product price and buy btn -->
                    <section class="col-md-3">
                        <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">

                            <!-- start product price section -->
                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">قیمت کالا</p>
                                <p class="text-muted"><span id="product-price" data-product-orginal-price="{{number_format($product->price)}}">{{number_format($product->price)}}</span> <span class="small">تومان</span></p>
                            </section>
                            <!-- end product price section -->


                            <!-- start product amazing sale discount section -->
                            @php
                            $amazingSale = $product->activeAmazingSales();
                            @endphp

                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">تخفیف کالا</p>
                                <p class="text-danger fw-bolder" id="product_discount_price"><span id="product-discount" data-product-discount-price="{{ $amazingSale ? number_format($product->price *  ($amazingSale->percentage / 100)) : 0 }}">{{ $amazingSale ? number_format($product->price *  ($amazingSale->percentage / 100)) : 0 }}</span> <span class="small">تومان</span></p>
                            </section>
                            <!-- end product amazing sale discount section -->

                            <section class="border-bottom mb-3"></section>

                            <!-- start product final price section -->
                            <section class="d-flex justify-content-end align-items-center">
                                <p class="fw-bolder">
                                    <span id="final-price">
                                        {{
                                            number_format($product->price - ($product->price * ($amazingSale ? ($amazingSale->percentage / 100) : 0)))
                                        }}
                                    </span>
                                    <span class="small">تومان</span>
                                </p>
                            </section>
                            <!-- end product final price section -->

                            <!-- start btn add to basket store -->
                            <section class="">
                                @if($product->marketable == 0)
                                <a id="next-level" href="javascript:void(0)" class="btn btn-outline-secondary d-block">به زودی</a>
                                @elseif ($product->marketable_number > 0)
                                <button id="next-level" type="submit" class="btn btn-danger d-block">افزودن به سبد خرید</button>
                                @else
                                <a id="next-level" href="#" class="btn btn-outline-secondary d-block">موجود شد اطلاع بده</a>
                                @endif
                            </section>
                            <!-- end btn add to basket store -->
                        </section>
                        </form>
                    </section>
                    <!-- end product price and buy btn -->
                </section>
            </section>
        </section>
    </section>
</section>
<!-- end cart -->


@isset($relatedProducts)
<!-- start product lazy load -->
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
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
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
                                        <a class="product-link" href="{{ route('customer.market.product', $relatedProduct) }}">

                                            <!-- start product image section -->
                                            <section class="product-image">
                                                <img class="" src="{{ asset($relatedProduct->image['indexArray'][$relatedProduct->image['currentImage']]) }}" alt="{{$relatedProduct->name}}">
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
<!-- end product lazy load -->
@endisset

<!-- start description, features and comments -->
<section class="mb-4">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <section class="content-wrapper bg-white p-3 rounded-2">
                    <!-- start content header -->
                    <section id="introduction-features-comments" class="introduction-features-comments">
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    @isset($product->introduction)
                                    <span class="me-2"><a class="text-decoration-none text-dark" href="#introduction">معرفی</a></span>
                                    @endisset
                                    @isset($product->metas)
                                    <span class="me-2"><a class="text-decoration-none text-dark" href="#features">مشخصات</a></span>
                                    @endisset
                                    <span class="me-2"><a class="text-decoration-none text-dark" href="#comments">دیدگاه ها</a></span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                    </section>

                    <!-- start content header -->
                    <section class="py-4">
                        @isset($product->introduction)
                        <!-- start vontent header -->
                        <section id="introduction" class="content-header mt-2 mb-4">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title content-header-title-small">
                                    معرفی
                                </h2>
                            </section>
                        </section>
                        <!-- start introduction of product -->
                        <section class="product-introduction mb-4">
                            {!! $product->introduction !!}
                        </section>
                        <!-- end introduction of product -->
                        @endisset


                        @isset($product->metas)
                        <!-- start vontent header -->
                        <section id="features" class="content-header mt-2 mb-4">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title content-header-title-small">
                                    مشخصات
                                </h2>
                            </section>
                        </section>

                        <!-- start product features table -->
                        <section class="product-features mb-4 table-responsive">
                            <table class="table table-bordered border-white">
                                <tr class="bg-light border-bottom">
                                    <td><strong>مشخصات فیزیکی</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>ابعاد <small>(طول × عرض × ارتفا)</small></td>
                                    <td>{{$product->length .' × ' . $product->width .' × ' .$product->width}} سانتیمتر</td>
                                </tr>
                                <tr>
                                    <td>وزن</td>
                                    <td>{{$product->weight < 1 ? ($product->weight * 1000) . ' گرم ' : $product->weight . ' کیلوگرم '}}</td>
                                </tr>
                                <tr class="bg-light border-bottom">
                                    <td><strong>ویژگی ها</strong></td>
                                    <td></td>
                                </tr>
                                @foreach ($product->metas as $meta)
                                <tr>
                                    <td>{{$meta->meta_key}}</td>
                                    <td>{{$meta->meta_value}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </section>
                        <!-- end product features table -->
                        @endisset

                        <!-- start vontent header -->
                        <section id="comments" class="content-header mt-2 mb-4">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title content-header-title-small">
                                    دیدگاه ها
                                </h2>
                            </section>
                        </section>

                        <section class="product-comments mb-4">
                            <!-- start add comment button -->
                            @auth
                            <section class="comment-add-wrapper">
                                <button class="comment-add-button" type="button" data-bs-toggle="modal" data-bs-target="#add-comment"><i class="fa fa-plus"></i> افزودن دیدگاه</button>
                                <!-- start add comment Modal -->
                                <section class="modal fade" id="add-comment" tabindex="-1" aria-labelledby="add-comment-label" aria-hidden="true">
                                    <section class="modal-dialog">
                                        <section class="modal-content">
                                            <section class="modal-header">
                                                <h5 class="modal-title" id="add-comment-label"><i class="fa fa-plus"></i> افزودن دیدگاه</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </section>
                                            <form action="{{ route('customer.market.add-comment', $product)}}" method="post">
                                                <section class="modal-body">
                                                    @csrf
                                                    <section class="col-12 mb-2">
                                                        <label for="comment" class="form-label mb-1">دیدگاه شما</label>
                                                        <textarea class="form-control form-control-sm" id="comment" name="body" placeholder="دیدگاه شما ..." rows="4"></textarea>
                                                    </section>
                                                </section>
                                                <section class="modal-footer py-1">
                                                    <button type="submit" class="btn btn-sm btn-primary">ثبت دیدگاه</button>
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
                                                </section>
                                            </form>
                                        </section>
                                    </section>
                                </section>
                            </section>
                            @endauth
                            @guest
                            <section class="comment-add-wrapper">
                                <a class="comment-add-button text-decoration-none" href="{{route('auth.customer.login-register-form') }}"><i class="fa fa-plus"></i> جهت افزودن دیدگاه ابتدا به حساب کاربری خود وارد شوید</a>
                            </section>
                            @endguest
                            <!-- start add comment button -->

                            <!-- start show users comments button -->
                            @forelse ($product->activeComments() as $comment)
                            <section class="product-comment">
                                <section class="product-comment-header d-flex justify-content-start">
                                    <section class="product-comment-date">{{jalaliDate($comment->created_at)}}</section>
                                    <section class="product-comment-title">{{ ($comment->author->full_name) ? $comment->author->full_name : 'ناشناس'}}</section>
                                </section>
                                <section class="product-comment-body">
                                    {{ $comment->body }}
                                </section>

                                @foreach($product->activeShowAnswer() as $activeShowAnswer)
                                @if($activeShowAnswer->id == $comment->id)
                                <section class="product-comment ms-5 border-bottom-0">
                                    <section class="product-comment-header d-flex justify-content-start">
                                        <section class="product-comment-date">{{jalaliDate($activeShowAnswer->answer_date)}}</section>
                                        <section class="product-comment-title">ادمین</section>
                                    </section>
                                    <section class="product-comment-body">
                                        {{$activeShowAnswer->answer}}
                                    </section>
                                </section>
                                @endif
                                @endforeach
                            </section>
                            @empty
                            <section class="product-comment">
                                <section class="product-comment-body text-center py-3">
                                    <strong>دیدگاهی برای این محصول درج نشده است</strong>
                                </section>
                            </section>
                            @endforelse
                            <!-- end show users comments button -->
                        </section>
                    </section>
                    <!-- end content header -->
                </section>
            </section>
        </section>
    </section>
</section>
<!-- end description, features and comments -->
@endsection
@section('script')
<script src="{{ asset('customer-assets/js/pages/product-detail.js') }}"></script>

@include('customer.alerts.sweetalert.success')
@include('customer.alerts.sweetalert.error')

@endsection