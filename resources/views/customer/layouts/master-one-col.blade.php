<!doctype html>
<html lang="fa" dir="rtl">

<head>
    @include('customer.layouts.seo')
    @include('customer.layouts.head-tag')
    @yield('haed-tag')
</head>

<body>
    @include('customer.layouts.header')
    <!-- start main one col -->
    <main id="main-body-one-col" class="main-body">
        @yield('content')
    </main>
    <!-- end main one col -->

    <!-- start toast alert -->
    <section class="position-fixed flex-row-reverse" style="z-index: 1000000000; left: 0;bottom: 3rem;width: 24rem;max-width: 80%;">
        <section class="toast fade hide" data-delay="7000" role="alert" aria-live="assertive" aria-atomic="true">
            <section class="toast-header">
                <strong class="me-auto">فروشگاه</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </section>
            <section class="toast-body shadow">
                <strong class="ml-auto">
                    برای افزودن کالا به لیست علاقه مندی ها باید ابتدا وارد حساب کاربری خود شوید
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
   
    <!-- start toast alert -->
    <section class="position-fixed flex-row-reverse" style="z-index: 1000000000; left: 0;bottom: 3rem;width: 24rem;max-width: 80%;">
        <section class="toast-rate fade hide" data-delay="7000" role="alert" aria-live="assertive" aria-atomic="true">
            <section class="toast-header">
                <strong class="me-auto">فروشگاه</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </section>
            <section class="toast-body shadow">
                <strong class="ml-auto">
                    برای امتیازدهی به این محصول باید ابتدا وارد حساب کاربری خود شوید
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
   
    <!-- start toast alert -->
    <section class="position-fixed flex-row-reverse" style="z-index: 1000000000; left: 0;bottom: 3rem;width: 24rem;max-width: 80%;">
        <section class="toast-cart fade hide" data-delay="7000" role="alert" aria-live="assertive" aria-atomic="true">
            <section class="toast-header">
                <strong class="me-auto">فروشگاه</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </section>
            <section class="toast-body shadow">
                <strong class="ml-auto">
                    برای افزودن این محصول به سبد خرید خود باید ابتدا وارد حساب کاربری خود شوید
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
    @include('customer.alerts.sweetalert.logout-confirm', ['className' => 'logout'])
</body>

</html>