<!-- start footer -->
<footer class="footer">
    <section class="container-xxl my-4">

        <!-- shop features area -->
        @include('customer.layouts.partials.footer.footer-shop-features')
        <!-- shop features area -->

        <section class="row">

            <!-- menu area -->
            @include('customer.layouts.partials.footer.menu-footer')
            <!-- menu area -->

            <section class="col-md-5">
                <section>
                    <section class="text-dark fw-bold">با ما همراه باشید</section>
                    <section class="my-3">
                        @isset($setting->instagram)
                        <a href="{{ $setting->instagram }}" target="_blank" class="text-muted text-decoration-none me-5"><i class="fab fa-instagram"></i></a>
                        @endisset
                        @isset($setting->telegram)
                        <a href="{{ $setting->telegram }}" target="_blank" class="text-muted text-decoration-none me-5"><i class="fab fa-telegram"></i></a>
                        @endisset
                        <!-- <a href="#" class="text-muted text-decoration-none me-5"><i class="fab fa-whatsapp"></i></a> -->
                        @isset($setting->twitter)
                        <a href="{{ $setting->twitter }}" target="_blank" class="text-muted text-decoration-none me-5"><i class="fab fa-twitter"></i></a>
                        @endisset
                        @isset($setting->linkedin)
                        <a href="{{ $setting->linkedin }}" target="_blank" class="text-muted text-decoration-none me-5"><i class="fab fa-linkedin"></i></a>
                        @endisset
                    </section>
                </section>
            </section>
        </section>
        <section class="row my-5">
            <section class="col">
                <section class="fw-bold">شرکت {{$setting->title}}</section>
                <section class="text-muted footer-intro">{!! strip_tags($setting->description) !!}</section>
            </section>
        </section>

        <section class="row border-top pt-4">
            <section class="col">
                <section class="text-muted footer-intro text-center">کلیه حقوق این وبسایت متعلق به شرکت {{$setting->title}} می باشد.</section>
            </section>
        </section>
    </section>
</footer>
<!-- end footer -->