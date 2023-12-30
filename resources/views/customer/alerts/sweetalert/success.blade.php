@if(session('swal-success'))
    <script>
        $(document).ready(function (){
            swal.fire({
                title:                  'خطا',
                text:                   '{{ session('swal-success') }}',
                icon:                   'success',
                confirmButtonText :     'دمت گرم',
            });
        });
    </script>
@endif
