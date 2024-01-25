@auth
@if(auth()->user()->user_type == 0)
<section class="d-inline px-md-3">
    <button class="btn btn-link text-decoration-none text-dark dropdown-toggle profile-button" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-user"></i>
    </button>
    <section class="dropdown-menu dropdown-menu-end custom-drop-down" aria-labelledby="dropdownMenuButton1">
        <section><a class="dropdown-item" href="{{ route('customer.profile.my-profile') }}"><i class="fa fa-user-circle"></i>پروفایل کاربری</a></section>
        <section><a class="dropdown-item" href="{{ route('customer.profile.order.orders') }}"><i class="fa fa-newspaper"></i>سفارشات</a></section>
        <section><a class="dropdown-item" href="{{ route('customer.profile.favorite.my-favorites') }}"><i class="fa fa-heart"></i>لیست علاقه مندی</a></section>
        <section><a class="dropdown-item" href="{{ route('customer.profile.ticket.my-tickets') }}"><i class="fa fa-envelope-open-text"></i>تیکت ها</a></section>
        <section>
            <hr class="dropdown-divider">
        </section>
        <section><a class="dropdown-item logout" href="javascript:void(0)"><i class="fa fa-sign-out-alt"></i>خروج</a></section>
    </section>
</section>
@else
<section class="d-inline px-3">
    <a href="{{ route('auth.customer.login-register-form') }}" class="btn btn-link text-decoration-none text-dark profile-button">
        <i class="fa fa-user-lock"></i>
    </a>
</section>
@endif
@endauth
@guest
<section class="d-inline px-3">
    <a href="{{ route('auth.customer.login-register-form') }}" class="btn btn-link text-decoration-none text-dark profile-button">
        <i class="fa fa-user-lock"></i>
    </a>
</section>
@endguest