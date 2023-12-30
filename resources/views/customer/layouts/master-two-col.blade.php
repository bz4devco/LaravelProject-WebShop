<!doctype html>
<html lang="fa" dir="rtl">

<head>
    @include('customer.layouts.seo')
    @include('customer.layouts.head-tag')
    @yield('haed-tag', ['setting' => $setting])
</head>

<body>
    @include('customer.layouts.header')



    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">
                @include('customer.layouts.sidebar')
                @yield('content')
            </section>
        </section>
    </section>
    <!-- end body -->

    @include('customer.layouts.footer')
    @include('customer.layouts.script')
    @yield('script')
</body>

</html>