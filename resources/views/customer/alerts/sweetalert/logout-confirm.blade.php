<script>
    $(document).ready(function() {
        let className = '{{ $className }}',
            element = $('.' + className);
            

        element.on('click', function(e){
            e.preventDefault();
            let id = $(this).attr('id');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass:{
                    confirmButton: 'btn btn-danger mx-2',
                    cancelButton: 'btn btn-secondary mx-2',
                },
                buttonsStyling: false
            });


            swalWithBootstrapButtons.fire({
                title: "آیا از خروج حساب کاربری خود مطمئن هستید؟ ",
                text: "شما میتوانید درخواست خود را لغو نمایید",
                icon: "info",
                showCancelButton: true,
                confirmButtonText: "خروج",
                cancelButtonText: "لغو خروج",
                reverseButtons: true,
            }).then((result) => {
                if (result.value == true) {
                    window.location.href = "{{ route('auth.customer.logout') }}";
                    $(this).parent().submit();
                }
            });


        });
    });
</script>