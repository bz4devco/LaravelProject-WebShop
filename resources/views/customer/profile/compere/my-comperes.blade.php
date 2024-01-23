@extends('customer.layouts.master-two-col')

@section('haed-tag')
<link rel="stylesheet" href="{{ asset('customer-assets/css/product.css') }}">
<meta name="robots" content="noindex, nofollow">

<title>لیست مقایسه من | {{$setting->title}}</title>
@endsection

@section('content')
<section class="content-wrapper bg-white p-3 rounded-2 mb-2">

    <!-- start vontent header -->
    <section class="content-header mb-4">
        <section class="d-flex justify-content-between align-items-center">
            <h2 class="content-header-title">
                <span>لیست مقایسه من</span>
            </h2>
            <section class="content-header-link">
                <button type="button" class="btn btn-sm btn-primary text-white mb-1" data-bs-toggle="modal" data-bs-target="#addToCompareModal">افزودن محصول به لیست</button>
            </section>
        </section>
    </section>
    <!-- end vontent header -->

    @if(auth()->user()->compare->products()->count() > 0)
    <section class="table-responsive overflow-x-auto">
        <table class="table table-bordered bg-light table-responsive">
            <thead>
                <tr>
                    <th>
                    </th>
                    @foreach (auth()->user()->compare->products as $product)
                    <th class="m-auto position-relative">
                        <a href="{{ route('customer.profile.compare.destroy-compare', $product) }}" class="btn-close position-absolute shadow bg-light" style="left: 10px;top:10px;z-index: 2;" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف محصول از لیست مقایسه"></a>
                        <a class="text-decoration-none text-dark w-100 mx-auto d-flex justify-content-center" href="{{ route('customer.market.product', $product)}}" target="_blank">
                            <img src="{{ hasFileUpload($product->image['indexArray']['medium']) }}" height="200" alt="{{$product->name}}">
                        </a>
                    </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>نام محصول</th>
                    @foreach (auth()->user()->compare->products as $product)
                    <td class="text-center" title="{{$product->name}}">{{ Str::limit($product->name , 30) }}</th>
                        @endforeach
                </tr>
                <tr>
                    <th>مشخصات محصول</th>
                    @foreach (auth()->user()->compare->products as $product)
                    <td>
                        @isset($product->metas)
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
                    </td>
                    @endforeach
                </tr>
                <tr>
                    <th>قیمت محصول</th>
                    @foreach (auth()->user()->compare->products as $product)
                    <td class="text-center">
                        <span class="d-inline-block mb-3 text-success">{{ number_format($product->showFinalPrice()) }} تومان</span>
                        <br>
                        <form class="text-center" action="{{ route('customer.sales-process.add-to-cart', $product) }}" method="post">
                            @csrf
                            @if($product->activeColors()->count() > 0)
                            <input type="hidden" name="color" value="{{ $product->activeColors()->first()->id }}">
                            @endif
                            @if($product->activeGuarantees()->count() > 0)
                            <input type="hidden" name="guarantee" value="{{ $product->activeGuarantees()->first()->id }}">
                            @endif
                            <input type="hidden" name="number" class="d-none" value="1">
                            <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-cart-plus"></i> افزودن به سبد خرید</button>
                        </form>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </section>
    @else
    <section class="cart-item d-flex py-5 justify-content-center">
        <strong>لیست مقایسه شما خالی می باشد</strong>
    </section>
    @endforelse

</section>

@include('customer.model.products-compare', ['products' => $products])

@endsection
@section('script')

@include('customer.alerts.sweetalert.success')
@include('customer.alerts.sweetalert.error')

@endsection