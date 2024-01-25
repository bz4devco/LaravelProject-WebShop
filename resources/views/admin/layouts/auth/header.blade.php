<!-- header start -->
<!-- ** header top postion fixed z-index 1000 ** -->
<header class="header-main d-flex justify-content-between" id="header">
    <!-- header sidbar right area -->
    <!-- ** dashboard menu for transfer to admin pages ** -->
    <section class="w-100 bg-gray d-flex justify-content-between">
        <section class="px-2">
            <span><img class="logo" src="{{ hasFileUpload('admin-assets/images/logo.png') }}" alt=""></span>
        </section>
        <section class="px-5">
            <a href="{{route('customer.home')}}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="رفتن به وب سایت"><i class="fas fa-house-user text-light fa-lg"></i></a>
        </section>
    </section>
    <!-- header sidbar right area -->
</header>
<!-- header end -->