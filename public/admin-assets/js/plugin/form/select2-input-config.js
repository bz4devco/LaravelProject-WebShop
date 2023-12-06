$(document).ready(function (){

    /// select2 config for tags input
    let tags_input = $('#tags'),
        select_tags = $('#select_tags'),
        default_tags = tags_input.val(),
        default_data = null;

        if((tags_input.val() !== null && tags_input.val().length > 0))
        {
            default_data = default_tags.split(',');
        }

    select_tags.select2({
        placeholder: 'لطفا برچسب های خود را وارد کنید',
        tags: true,
        data: default_data,
    });

    // set old data on select2 input after redirect back to form in page
    select_tags.children('option').attr('selected', true).trigger('change');


    // transfer data from setest2 input to orginal form input 
    $('#form').submit(function ( event ){
        if(select_tags.val() !== null && select_tags.val().length > 0){
            let selectedSource = select_tags.val().join(',');
            tags_input.val(selectedSource);
        }
    });

});