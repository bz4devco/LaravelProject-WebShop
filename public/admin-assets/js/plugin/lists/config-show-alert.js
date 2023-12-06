if($('.alert.alert-success').length){
    $('.alert.alert-success').addClass('show').delay(8500).queue(function (){
        $(this).remove();
    });
}
if($('.alert.alert-danger').length){
    $('.alert.alert-danger').addClass('show').delay(30000).queue(function (){
        $(this).remove();
    });
}
if($('.alert.alert-info').length){
    $('.alert.alert-info').addClass('show').delay(30000).queue(function (){
        $(this).remove();
    });
}
if($('.alert.alert-warning').length){
    $('.alert.alert-warning').addClass('show').delay(15000).queue(function (){
        $(this).remove();
    });
}