<section class="sidebar-nav-sub-wrapper py-1 px-2">
    @foreach ($categories as $category)
    <section class="sidebar-nav-sub-item">
        <span class="sidebar-nav-sub-item-title">
            <a href="{{ route('customer.market.products', $category->id) }}">{{$category->name}}</a>
            @if($category->children->count() > 0)
            <i class="fa fa-angle-left"></i>
            @endif
        </span>

        @if($category->children->count() > 0)
        <section class="sidebar-nav-sub-sub-wrapper  py-1 px-2">
            <section class="sidebar-nav-sub-sub-item">
                @foreach ($category->children as $category)
                <a href="{{ route('customer.market.products', $category->id) }}">{{$category->name}}</a>
                @endforeach
            </section>
        </section>
        @endif
    </section>
    @endforeach
</section>