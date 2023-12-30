@if(session('alert-section-error'))
<div class="alert alert-danger alert-dismissible fade" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <p class="mb-0">
        {{ session('alert-section-error') }}
    </p>
</div>
@endif