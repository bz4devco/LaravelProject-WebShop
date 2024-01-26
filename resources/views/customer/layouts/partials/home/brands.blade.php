<section class="brand-part mb-4 py-4">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <!-- start vontent header -->
                <section class="content-header">
                    <section class="d-flex align-items-center">
                        <h2 class="content-header-title">
                            <span>برندهای ویژه</span>
                        </h2>
                    </section>
                </section>
                <!-- start vontent header -->
                <section class="brands-wrapper py-4">
                    <section class="brands dark-owl-nav owl-carousel owl-theme">
                        @foreach ( $brands as $brand )
                        <section class="item">
                            <section class="brand-item">
                                <a target="_blank" href="{{ route('customer.market.products', ['brands[]' => $brand->id]) }}"><img class="rounded-2" src="{{ hasFileUpload($brand->logo) }}" style="max-height: 80px;" alt="{{$brand->orginal_name}}"></a>
                            </section>
                        </section>
                        @endforeach
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>