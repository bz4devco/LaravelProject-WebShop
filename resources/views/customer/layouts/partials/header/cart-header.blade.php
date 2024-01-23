<section class="header-cart d-inline ps-3 border-start position-relative">
    <a class="btn btn-link position-relative text-dark header-cart-link" href="javascript:void(0)">
        <i class="fa fa-shopping-cart"></i> <span style="top: 80%;" class="position-absolute start-0 translate-middle badge rounded-pill bg-danger">{{$cartItems->count() ?? 0}}</span>
    </a>
    <section class="header-cart-dropdown">
        <section class="border-bottom d-flex justify-content-between p-2">
            <span class="text-muted">{{$cartItems->count() ?? 0}} کالا</span>
            <a class="text-decoration-none text-info" href="{{ route('customer.sales-process.cart') }}">مشاهده سبد خرید </a>
        </section>
        @if($cartItems->count() > 0)
        <section class="header-cart-dropdown-body">
            @php
            $totalProductPrice = 0;
            $totalDiscount = 0
            @endphp

            @foreach ($cartItems as $cartItem)

            @php
            $totalProductPrice += $cartItem->cartItemProductPrice() * $cartItem->number;
            $totalDiscount += $cartItem->cartItemProductDiscount() * $cartItem->number;
            @endphp
            <section class="header-cart-dropdown-body-item d-flex justify-content-start align-items-center">
                <img class="flex-shrink-1" src="{{ hasFileUpload($cartItem->product->image['indexArray'][$cartItem->product->image['currentImage']]) }}" alt="{{$cartItem->product->name}}">
                <section class="w-100 text-truncate"><a class="text-decoration-none text-dark" href="{{ route('customer.market.product', $cartItem->product)}}">{{$cartItem->product->name}}</a></section>
                <section class="flex-shrink-1"><a class="text-muted text-decoration-none p-1" href="{{ route('customer.sales-process.remove-from-cart', $cartItem->id) }}"><i class="fa fa-trash-alt"></i></a></section>
            </section>
            @endforeach
        </section>
        <section class="header-cart-dropdown-footer border-top d-flex justify-content-between align-items-center p-2">
            <section class="">
                <section>مبلغ قابل پرداخت</section>
                <section> {{number_format($totalProductPrice - $totalDiscount)}} تومان</section>
            </section>
            <section class=""><a class="btn btn-danger btn-sm d-block" href="{{ route('customer.sales-process.cart') }}">ثبت سفارش</a></section>
        </section>
        @else
        <section class="header-cart-dropdown-body-item">
            <section class="w-100 text-center py-2"><strong>سبد خرید خالی است</strong></section>
        </section>
        @endif
    </section>
</section>