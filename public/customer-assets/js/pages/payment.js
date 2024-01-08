$(function () {
    if(error != ``)
    {
        creaInput(error);
    }else{
        let error ='';
    }
    $('input[name="payment_type"]').change(function () {
        if (!$(this).hasClass("cash")) {
            if ($(".content-wrapper").find(".cash_receiver").length != 0) {
                $(".content-wrapper").find(".cash_receiver").remove();
                $(".content-wrapper").find(".error").remove();
            }
        }
    });

    $("#cash-payment").click(function () {
        creaInput(error);
    });
});

function creaInput(error) {
    let newDiv = document.createElement("div"),
        oldValue = $("#cash-payment").attr('dada-old-value');
    if ($(".content-wrapper").find(".cash_receiver").length == 0) {
        newDiv.innerHTML =
            `
    <section class="input-group input-group-sm cash_receiver">
        <input type="text" name="cash_receiver" class="form-control" form="payment-submit" value="` + oldValue + `" placeholder="نام و نام خانوادگی دریافت کننده" required>
    </section>` +
    error ;

        document
            .getElementsByClassName("content-wrapper")[1]
            .appendChild(newDiv);
    }
}
