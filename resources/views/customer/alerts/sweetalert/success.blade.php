@if(session('swal-success'))
    <script>
        $(document).ready(function (){
            swal.fire({
                title:                  'عملیات موفقیت آمیز',
                text:                   '{{ session('swal-success') }}',
                icon:                   'success',
                confirmButtonText :     'خیلی هم عالی',
            });
        });
    </script>
@endif
