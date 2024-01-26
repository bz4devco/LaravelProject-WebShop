@foreach ($categories as $category)
@if($category->parent_id == null)
<section class="sublist-item">
    <section class="sublist-item-toggle">{{$category->name}}</section>


    @if($category->children->count() > 0)
    <section class="sublist-item-sublist">
        <section class="sublist-item-sublist-wrapper d-flex justify-content-around align-items-center">
            @include('customer.layouts.partials.header.header-category.sub-categories', ['categories' => $category->children])
        </section>
    </section>
    @endif
</section>
@endif
@endforeach