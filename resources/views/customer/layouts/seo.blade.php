    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="generator" content="{!! $setting->title !!}" />
    <meta name="accept-language" content="fa-IR" />
    <meta property="og:type" content="Website" />
    <meta property="og:locale" content="fa_IR" />
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:title" content="{!! $setting->title !!}">
    <meta property="og:url" content="{{url('')}}" />
    <meta property="og:site_name" content="{!! $setting->title !!}" />
    @isset($product)
    <meta property="og:image" content="{{ asset($product->image['indexArray']['small']) }}">
    @endisset
    <meta name="keywords" content="{!! isset($product) ? $product->tags :  $setting->keywords !!}" />
    <meta name="description" content="{!! isset($product) ? $product->slug : $setting->description !!}">
    <meta property="og:description" content="{!! isset($product) ? $product->slug : $setting->description !!}">
    <meta name="author" content="{!! $setting->title !!}">
    @include('customer.layouts.schema')
    <!-- <meta name="google-site-verification" content="xo3K9mS9fmyYy5CUfkmGQnCAhMvU-DDbTwSu5NYIcr4" /> -->
    <meta name="geo.placename" content="Mazandaran" />
    <meta name="geo.position" content="36.57933442984207;53.04880161147981" />
    <meta name="geo.region" content="ایران" />
    <link rel="icon" type="image/png" href="{{asset($setting->icon)}}">
    <link rel="icon" href="{{asset($setting->icon)}}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{asset($setting->icon)}}" />
    <meta name="msapplication-TileImage" content="{{asset($setting->icon)}}" />