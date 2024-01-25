 <!-- start header -->
 <header class="header mb-4" id="header">


     <!-- start top-header logo, searchbox and cart -->
     <section class="top-header">
         <section class="container-xxl ">
             <section class="d-md-flex justify-content-md-between align-items-md-center py-3">
                 <section class="d-flex justify-content-between align-items-center d-md-block">
                     <a class="text-decoration-none" href="{{ route('customer.home') }}"><img src="{{ hasFileUpload($setting->logo, 'logo') }}" alt="{{ $setting->title }}"></a>
                     <button class="btn btn-link text-dark d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                         <i class="fa fa-bars me-1"></i>
                     </button>
                 </section>

                 <!-- search input area -->
                 @include('customer.layouts.partials.header.search-header')
                 <!-- search input area -->

                 <section class="row">
                     <!-- search mobile input area -->
                     @include('customer.layouts.partials.header.search-mobile-header')
                     <!-- search mobile input area -->

                     <section class="col-md-12 col-sm-6 col-6 text-end mt-3 mt-md-auto ">
                         <!-- customer profile drop down and register button aria -->
                         @include('customer.layouts.partials.header.profile-header')
                         <!-- customer profile drop down and register button aria -->

                         <!-- header cart area -->
                         @include('customer.layouts.partials.header.cart-header', ['cartItems' => $cartItems])
                         <!-- header cart area -->
                     </section>
                 </section>
             </section>
         </section>
     </section>
     <!-- end top-header logo, searchbox and cart -->

     <!-- start menu -->
     <nav class="top-nav">
         <section class="container-xxl ">
             <nav class="">
                 <section class="d-none d-md-flex justify-content-md-start position-relative">
                     <section class="super-navbar-item me-4">
                         <section class="super-navbar-item-toggle">
                             <i class="fa fa-bars me-1"></i>
                             دسته بندی کالاها
                         </section>
                         <section class="sublist-wrapper position-absolute w-100">
                             <section class="position-relative sublist-area">
                                 @include('customer.layouts.partials.header.header-category.categories', ['categories' => $headerCateegories])
                             </section>
                         </section>
                     </section>
                     <section class="border-start my-2 mx-1"></section>
                     <!-- menu area -->
                     @include('customer.layouts.partials.header.menu-header')
                     <!-- menu area -->
                     
                 </section>

                 <!--mobile view-->
                 <section class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="z-index: 9999999;">
                     <section class="offcanvas-header">
                         <h5 class="offcanvas-title" id="offcanvasExampleLabel"><a class="text-decoration-none" href="{{ route('customer.home') }}"><img src="{{ hasFileUpload($setting->logo, 'logo') }}" alt="{{ $setting->title }}"></a></h5>
                         <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                     </section>
                     <section class="offcanvas-body">
                         <!-- menu area -->
                         @include('customer.layouts.partials.header.menu-header', ['categories' => $headerCateegories])
                         <!-- menu area -->

                         <hr class="border-bottom">
                         <section class="navbar-item"><a href="javascript:void(0)">دسته بندی</a></section>
                         <!-- start sidebar nav-->
                         <section class="sidebar-nav mt-2 px-3">
                             @include('customer.layouts.partials.header.header-mobile-category.categories', ['categories' => $headerCateegories])
                         </section>
                         <!--end sidebar nav-->
                     </section>
                 </section>
                 <!--mobile view-->
             </nav>
         </section>
     </nav>
     <!-- end menu -->
 </header>
 <!-- end header -->