<section class="mb-3">
    <section class="container-xxl">
        <!-- four column-->
        <section class="row py-4">
            @foreach ($fourBanners as $fourBanner)
            <section class="col"><a target="_blank" href="{{ urldecode($fourBanner->url) }}"><img class="d-block rounded-2 w-100" src="{{ hasFileUpload($fourBanner->image , 'banner-four-col') }}" alt="{{ $fourBanner->title }}"></a></section>
            @endforeach
        </section>
    </section>
</section>