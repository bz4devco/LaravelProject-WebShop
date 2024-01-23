<section class="sublist-column col">
    @foreach ($categories as $category)
    <a href="{{ route('customer.market.products', $category->id) }}" class="sub-category">{{$category->name}}</a>
    @if($category->children->count() > 0)
    @foreach ($category->children as $category)
    <a href="{{ route('customer.market.products', $category->id) }}" class="sub-sub-category">{{$category->name}}</a>
    @endforeach
    @endif
    @endforeach
</section>