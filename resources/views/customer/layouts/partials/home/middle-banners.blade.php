<section class="mb-3">
    <section class="container-xxl">
        <!-- two column-->
        <section class="row py-4">
            @foreach ( $middleBanners as $middleBanner)
            <section class="col-12 col-md-6 mt-2 mt-md-0"><a target="_blank" href="{{ urldecode($middleBanner->url) }}"><img class="d-block rounded-2 w-100" src="{{ hasFileUpload($middleBanner->image , 'banner-two-col') }}" alt="{{ $middleBanner->title }}"></a></section>
            @endforeach
        </section>
    </section>
</section>