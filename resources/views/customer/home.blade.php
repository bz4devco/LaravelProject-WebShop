@extends('customer.layouts.master-one-col')

@section('haed-tag')
<meta name="robots" content="index, follow">

<title>{{$setting->title}}</title>
@endsection

@section('content')

<!-- for SEO  -->
<h1 class="d-none">{{$setting->title}}</h1>

@isset($setting->index_page['slider'])
<!-- start slideshow -->
@include('customer.layouts.partials.home.slider', ['topBanners' => $topBanners, 'slideShowImages' => $slideShowImages])
<!-- end slideshow -->
@endisset

@isset($setting->index_page['mostVisitedProducts'])
@isset($mostVisitedProducts )
<!-- start product lazy load -->
@include('customer.layouts.partials.home.most-visited-products', ['mostVisitedProducts' => $mostVisitedProducts])
<!-- end product lazy load -->
@endisset
@endisset

@isset($setting->index_page['middleBanners'])
@isset($middleBanners)
<!-- start ads section -->
@include('customer.layouts.partials.home.middle-banners', ['middleBanners' => $middleBanners])
<!-- end ads section -->
@endisset
@endisset

@isset($setting->index_page['popularProducts'])
@isset($popularProducts)
<!-- start product lazy load -->
@include('customer.layouts.partials.home.popular-products', ['popularProducts' => $popularProducts])
<!-- end product lazy load -->
@endisset
@endisset

@isset($setting->index_page['fourBanners'])
@isset($fourBanners)
<!-- start ads section -->
@include('customer.layouts.partials.home.four-banners', ['fourBanners' => $fourBanners])
<!-- end ads section -->
@endisset
@endisset

@isset($setting->index_page['offerProducts'])
@isset($offerProducts)
<!-- start product lazy load -->
@include('customer.layouts.partials.home.offer-products', ['offerProducts' => $offerProducts])
<!-- end product lazy load -->
@endisset
@endisset

@isset($setting->index_page['bottomBanner'])
@isset($bottomBanner)
<!-- start ads section -->
@include('customer.layouts.partials.home.bottom-banner', ['bottomBanner' => $bottomBanner])
<!-- end ads section -->
@endisset
@endisset

@isset($setting->index_page['brands'])
@isset($brands)
<!-- start brand part-->
@include('customer.layouts.partials.home.brands', ['brands' => $brands])
<!-- end brand part-->
@endisset
@endisset

@endsection
@section('script')

@include('customer.alerts.sweetalert.success')
@include('customer.alerts.sweetalert.error')

@endsection