<section class="search-wrapper d-none d-md-block">
    <section class="search-box">
        <section class="search-textbox">
            <span><button type="submit" form="form-search" style="all:unset;cursor: pointer;"><i class="fa fa-search"></i></button></span>
            <form id="form-search" action="{{ route('customer.market.products') }}" method="get">
                <input id="search" type="text" name="search" class="" data-base-url="{{ URL::to('/') }}" data-url="{{ route('customer.search-ajax') }}" placeholder="جستجو{{$setting->title ? ' در ' . $setting->title : ''}} ..." value="{{request()->search ?? ''}}" autocomplete="off">
            </form>
        </section>
        <section class="search-result visually-hidden">
            <section class="search-result-item"><span class="search-no-result">موردی یافت نشد</span></section>
        </section>
    </section>
</section>