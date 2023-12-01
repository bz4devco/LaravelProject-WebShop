function changeStatus(id){
    let element = $('#' + id),
        url = element.attr('data-url'),
        elementValue = !element.prop('checked');
        $.ajax({
            url: url,
            type:"GET",
            success: function(response) {
                if(response.status){
                    if(response.checked)
                        element.prop('checked', true);
                    else

                        element.prop('checked', false);
                }
                else{
                    element.prop('checked', elementValue);
                }
            }
        });
}