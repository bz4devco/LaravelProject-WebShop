@if(session('toast-success'))
<div class="toast bg-custom-green text-white shadow-lg fade" data-bs-delay="10000" data-bs-animation="true" style="transition:  0.4s all;">
    <div class="toast-header bg-custom-green text-white">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
        <strong class="mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>  
            عملیات موفقیت آمیز
        </strong>
    </div>
    <div class="toast-body">
        {{ session('toast-success') }}
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.toast').toast('show');
    });
</script>
@endif