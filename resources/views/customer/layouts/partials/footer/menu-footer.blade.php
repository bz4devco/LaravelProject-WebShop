@php 
$rowInc = 4;
$oldRowInc = 0;
@endphp

@for ($i = 1; $i <= 3; $i++)
<section class="col-md">
    @foreach ($footerMenu as $key => $menu)
        @if($key >= $oldRowInc && $key <= $rowInc) 
            <section>
                <a class="text-decoration-none text-muted d-inline-block my-2" href="{{ $menu->url }}" target="_blank">{{ $menu->name }}</a>
            </section>
        @endif
        @if($key > $rowInc)
            @break
        @endif
    @endforeach
</section>

@php 
$oldRowInc = $rowInc + 1;
$rowInc += 5; 
@endphp

@endfor