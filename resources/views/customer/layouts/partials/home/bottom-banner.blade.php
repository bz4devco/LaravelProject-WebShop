<section class="mb-3">
    <section class="container-xxl">
        <!-- one column -->
        <section class="row py-4">
            <section class="col"><a target="_blank" href="{{ urldecode($bottomBanner->url) }}"><img class="d-block rounded-2 w-100" src="{{ hasFileUpload($bottomBanner->image , 'banner-width') }}" alt="{{ $bottomBanner->title }}"></a></section>
        </section>
    </section>
</section>