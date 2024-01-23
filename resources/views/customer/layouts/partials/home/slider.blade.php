<section class="container-xxl my-4">
    <section class="row">
        <section class="col-md-8 pe-md-1 ">
            <section id="slideshow" class="owl-carousel owl-theme">
                @forelse ( $slideShowImages as $slideShowImage)
                <section class="item"><a class="w-100 d-block h-auto text-decoration-none" target="_blank" href="{{ urldecode($slideShowImage->url) }}"><img class="w-100 rounded-2 d-block h-auto" src="{{ hasFileUpload($slideShowImage->image , 'slider') }}" alt="{{ $slideShowImage->title }}"></a></section>
                @empty
                <section class="item"><a class="w-100 d-block h-auto text-decoration-none" target="_blank" href="#"><img class="w-100 rounded-2 d-block h-auto" src="{{ hasFileUpload('#', 'slider') }}" alt="تصویر پیش فرض"></a></section>
                @endforelse
            </section>
        </section>

        <section class="col-md-4 ps-md-1 mt-2 mt-md-0">
            @forelse ( $topBanners as $topBanner)
            <section class="mb-2"><a target="_blank" href="{{ urldecode($topBanner->url) }}" class="d-block"><img class="w-100 rounded-2" src="{{ hasFileUpload($topBanner->image , 'banner') }}" alt="{{ $topBanner->title }}"></a></section>
            @empty
            <section class="mb-2"><a target="_blank" href="#" class="d-block"><img class="w-100 rounded-2" src="{{ hasFileUpload('#', 'slider') }}" alt="تصویر پیش فرض"></a></section>
            <section class="mb-2"><a target="_blank" href="#" class="d-block"><img class="w-100 rounded-2" src="{{ hasFileUpload('#', 'slider') }}" alt="تصویر پیش فرض"></a></section>
            @endforelse
        </section>
    </section>
</section>