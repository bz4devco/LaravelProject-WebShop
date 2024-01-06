<script>
    $(document).ready(function() {
        let className = '{{ $className }}',
            fieldTitle  = '{{ $fieldTitle }}',
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
                title: "آیا از حذف " + fieldTitle + " مطمئن هستید؟ ",
                text: "شما میتوانید درخواست خود را لغو نمایید",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "حذف شود",
                cancelButtonText: "لغو درخواست",
                reverseButtons: true,
            }).then((result) => {
                if (result.value == true) {
                    $(this).parent().submit();
                }
                else if(result.dismiss === swal.DismissReason.cancel){
                    swalWithBootstrapButtons.fire({
                        title: "لغو درخواست",
                        text: "درخواست شما لغو شد",
                        confirmButtonText: "حله",
                    });
                }
            });


        });
    });
</script>