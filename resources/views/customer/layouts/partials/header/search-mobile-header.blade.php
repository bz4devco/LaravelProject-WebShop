<section class="col-md-12 col-sm-6 col-6 d-md-none mt-3 mt-md-auto">
    <section class="search-wrapper">
        <section class="search-box">
            <section class="search-textbox">
                <span><button type="submit" form="form-search-mobile" style="all:unset;cursor: pointer;"><i class="fa fa-search"></i></button></span>
                <form id="form-search-mobile" action="{{ route('customer.market.products') }}" method="get">
                    <input id="search-mobile" type="text" name="search" class="" data-base-url="{{ URL::to('/') }}" data-url="{{ route('customer.search-ajax') }}" placeholder="جستجو در {{$setting->title ?? ''}}..." value="{{request()->search ?? ''}}" autocomplete="off">
                </form>
            </section>
            <section class="search-result visually-hidden">
                <section class="search-result-item"><span class="search-no-result">موردی یافت نشد</span></section>
            </section>
        </section>
    </section>
</section>