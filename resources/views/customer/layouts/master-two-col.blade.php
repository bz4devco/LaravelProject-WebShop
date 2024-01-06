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


    <!-- start toast alert -->
    <section class="position-fixed p-4 flex-row-reverse" style="z-index: 1000000000; left: 0;bottom: 3rem;width: 26rem;max-width: 80%;">
        <section class="toast" data-delay="7000" role="alert" aria-live="assertive" aria-atomic="true">
            <section class="toast-header">
                <strong class="me-auto">فروشگاه</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </section>
            <section class="toast-body shadow">
                <strong class="ml-auto">
                    برای افزودن کالا به لیست علافه مندی ها باید ابتدا وارد حساب کاربری خود شوید
                    <br>
                    <section class="text-center">
                        <a href="{{ route('auth.customer.login-register-form') }}" class="btn btn-sm btn-outline-primary mt-2">
                            ثبت نام / ورود
                        </a>
                    </section>
                </strong>
            </section>
        </section>
    </section>
    <!-- end toast alert -->

    @include('customer.layouts.footer')
    @include('customer.layouts.script')
    @yield('script')
</body>

</html>