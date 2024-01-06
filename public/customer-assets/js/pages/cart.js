$(document).ready(function () {
    bill();

    // number
    $(".cart-number").click(function () {
        bill();
    });
});

function bill() {
    let totalProductPrice = 0,
        totalDiscount = 0,
        totalPrice = 0,
        
        productPrice = 0,
        productDiscount = 0,
        number = 0;

    $(".number").each(function () {
        productPrice = parseFloat(
            $(this).data("product-price").replaceAll(",", "")
        );

        productDiscount = $(this).data("product-discount") == 0 ? 0 : parseFloat(
            $(this).data("product-discount").replaceAll(",", "")
        );
        number = parseFloat($(this).val().replaceAll(",", ""));

        totalProductPrice += productPrice * number;
        totalDiscount += productDiscount * number;
    });

    totalPrice = totalProductPrice - totalDiscount;

    // show result to html tags
    $("#total-product-price").html(priceFormat(totalProductPrice));
    $("#total-product-discount").html(priceFormat(totalDiscount));
    $("#total-price").html(priceFormat(totalPrice));
}

// convert number to price formet
function priceFormat(number) {
    number = new Intl.NumberFormat().format(number);
    return number;
}
