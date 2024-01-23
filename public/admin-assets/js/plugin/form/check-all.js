$(document).ready(function() {
    let selectAll = $("#select-all"),
        checkBoxAllLength = $('#form input[type="checkbox"]').length,
        checkBoxCheckedLength = $('#form input[type="checkbox"]:checked').length;

    $("#select-all").click(function(e) {
        if($("#select-all:checked").length > 0){
            $('#form input[type="checkbox"]').attr('checked','checked');
        }else{
            $('#form input[type="checkbox"]').removeAttr('checked');                
        }
    });

    if(checkBoxAllLength == checkBoxCheckedLength){
        $("#select-all").attr('checked', 'checked');
    }else{
        $("#select-all").removeAttr('checked');
    }

});