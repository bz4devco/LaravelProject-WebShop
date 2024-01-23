<section class="sidebar-nav-sub-wrapper py-1 px-2">
    @foreach ($categories as $category)
    @php
    $filtersArray['category'] = $category->id;
    @endphp
    <section class="sidebar-nav-sub-item">
        <span class="sidebar-nav-sub-item-title">
            <a class="d-inline-block w-100" href="{{ route('customer.market.products', $filtersArray) }}">{{$category->name}}</a>
            @if($category->children->count() > 0)
            <i class="fa fa-angle-left"></i>
            @endif
        </span>

        @if($category->children->count() > 0)
        @include('customer.layouts.partials.sidebar-category.sub-categories', ['categories' => $category->children])
        @endif
    </section>
    @endforeach
</section>