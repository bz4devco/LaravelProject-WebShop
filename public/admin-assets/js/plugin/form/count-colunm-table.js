if($('.table-col-count th').length > 0){
    let countColTable = $('.table-col-count th').length; 
    $('.emptyTable').attr('colspan', countColTable);
}