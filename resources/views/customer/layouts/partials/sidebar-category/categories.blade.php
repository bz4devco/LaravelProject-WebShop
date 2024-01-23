@foreach ($categories as $category)
@php 
$filtersArray['category'] = $category->id;
$itemsHref = ($category->children->count() > 0) ? 'javascript:void(0)' : route('customer.market.products', $filtersArray ); 
@endphp
<section class="sidebar-nav-item">
    <span class="sidebar-nav-item-title">
        <a href="{{ $itemsHref }}">{{$category->name}}</a>
        @if($category->children->count() > 0)
        <i class="fa fa-angle-left"></i>
        @endif
    </span>
    @if($category->children->count() > 0)
    @include('customer.layouts.partials.sidebar-category.sub-categories', ['categories' => $category->children])
    @endif
</section>
@endforeach