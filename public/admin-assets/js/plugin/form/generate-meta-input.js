$(function() {
    $('#btn-copy').on('click', function() {
        let ele = $(this).parent().prev().clone(true);
        $(this).before(ele);
    });
});