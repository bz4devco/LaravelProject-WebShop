
let printBtn = document.getElementById('print');
printBtn.addEventListener('click', function(){
    printContent('print-section');
})


function printContent(el){
    var restorePage = $('body').html();
    var printContent = $('#' + el).clone();
    $('body').empty().html(printContent);
    window.print();
    $('body').html(restorePage);
}
