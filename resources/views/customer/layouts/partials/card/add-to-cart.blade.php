@guest
<section class="product-add-to-cart"><button class="btn btn-sm text-decoration-none need-to-login" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></button></section>
@endguest
@auth
@php $cartProduct = hasProductToCart($product->id); @endphp
@if($cartProduct)
<section class="product-add-to-cart"><a class="btn btn-sm text-decoration-none" href="{{ route('customer.sales-process.remove-from-cart', $cartProduct) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="حذف از سبد خرید"><i class="fa fa-cart-plus text-danger"></i></a></section>
@else
<form action="{{ route('customer.sales-process.add-to-cart', $product) }}" method="post">
    @csrf
    @if($product->activeColors()->count() > 0)
    <input type="hidden" name="color" value="{{ $product->activeColors()->first()->id }}">
    @endif
    @if($product->activeGuarantees()->count() > 0)
    <input type="hidden" name="guarantee" value="{{ $product->activeGuarantees()->first()->id }}">
    @endif
    <input type="hidden" name="number" class="d-none" value="1">
    <section class="product-add-to-cart"><button class="btn btn-sm text-decoration-none" type="submit" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></button></section>
</form>
@endif
@endauth