<!doctype html>
<html lang="fa" dir="rtl">
<head>
    @include('customer.layouts.seo')
    @include('customer.layouts.head-tag')
    @yield('haed-tag', ['setting' => $setting])
</head>
<body>
    @include('customer.layouts.header')

    @yield('content')

    @include('customer.layouts.footer')
    @include('customer.layouts.script')
    @yield('script')
</body>
</html>