function copyToClipBoard(inputid, btnid = '',) {
        // Get the text field
        var copyText = $("."+inputid).val();
      

         // Copy the text inside the text field
        navigator.clipboard.writeText(copyText);

        if(btnid != ''){
            $('#'+btnid).html('<i class="fa fa-check ms-2"></i> کپی شد');
            $('#'+btnid).addClass('disabled');
            $('#'+btnid).addClass('btn-outline-success');
            $('#'+btnid).removeClass('btn-secondary');
        }
}