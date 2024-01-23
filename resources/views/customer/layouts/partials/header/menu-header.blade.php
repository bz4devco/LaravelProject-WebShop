@foreach ($headerMenu as $menu)
<section class="navbar-item"><a href="{{ $menu->url }}" target="_blank">{{ $menu->name }}</a></section>
@endforeach
