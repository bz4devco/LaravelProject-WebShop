@if(session('swal-error'))
    <script>
        $(document).ready(function (){
            swal.fire({
                title:                  'خطا',
                text:                   '{{ session('swal-error') }}',
                icon:                   'error',
                confermButtonText :     'حله',
            });
        });
    </script>
@endif