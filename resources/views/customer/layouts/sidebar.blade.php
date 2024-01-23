@php 
$myAddressActive    = Request::url() === route('customer.profile.address.my-address') ? 'active' : '';
$myOrdersActive     = Request::url() === route('customer.profile.order.orders') ? 'active' : '';
$myComparesActive   = Request::url() === route('customer.profile.compare.my-comperes') ? 'active' : '';
$myProfileActive    = Request::url() === route('customer.profile.my-profile') ? 'active' : '';
$myFavoriteActive   = Request::url() === route('customer.profile.favorite.my-favorites') ? 'active' : '';
$myTicketsActive    = Request::url() === route('customer.profile.ticket.my-tickets') ? 'active' : '';
@endphp


<section class="content-wrapper bg-white p-3 rounded-2 mb-3">
    <!-- start sidebar nav-->
    <section class="sidebar-nav">
        <section class="sidebar-nav-item">
            <span class="sidebar-nav-item-title {{ $myOrdersActive }}"><a class="p-3" href="{{ route('customer.profile.order.orders') }}">سفارش های من</a></span>
        </section>
        <section class="sidebar-nav-item">
            <span class="sidebar-nav-item-title {{ $myComparesActive }}"><a class="p-3" href="{{ route('customer.profile.compare.my-comperes') }}">لیست مقایسه من</a></span>
        </section>
        <section class="sidebar-nav-item">
            <span class="sidebar-nav-item-title {{ $myAddressActive }}"><a class="p-3" href="{{ route('customer.profile.address.my-address') }}">آدرس های من</a></span>
        </section>
        <section class="sidebar-nav-item">
            <span class="sidebar-nav-item-title {{ $myFavoriteActive }}"><a class="p-3" href="{{ route('customer.profile.favorite.my-favorites') }}">لیست علاقه مندی</a></span>
        </section>
        <section class="sidebar-nav-item">
            <span class="sidebar-nav-item-title {{ $myTicketsActive }}"><a class="p-3" href="{{ route('customer.profile.ticket.my-tickets') }}">تیکت های من</a></span>
        </section>
        <section class="sidebar-nav-item">
            <span class="sidebar-nav-item-title {{ $myProfileActive }}"><a class="p-3" href="{{ route('customer.profile.my-profile') }}">پروفایل من</a></span>
        </section>
        <section class="sidebar-nav-item">
            <span class="sidebar-nav-item-title logout"><a class="p-3">خروج از حساب کاربری</a></span>
        </section>

    </section>
    <!--end sidebar nav-->
</section>