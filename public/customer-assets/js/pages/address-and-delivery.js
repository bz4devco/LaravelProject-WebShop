$(document).ready(function () {
    checkRecipientMe();
    $("#receiver").change(function () {
        checkRecipientMe();
    });
    // input delivery
    $('input[name="delivery_type"]').change(function () {
        bill();
    });
});

function bill() {
    console.log(
        $('input[name="delivery_type"]:checked')
            .attr("data-delivery-price")
            .replaceAll(",", "")
    );
    let totalPrice = 0,
        deliveryPrice = 0;
    totalproductPrice = parseFloat(
        $("#total-price").attr("data-total-price").replaceAll(",", "")
    );

    // check change color price
    if ($('input[name="delivery_type"]:checked').length != 0) {
        deliveryPrice = parseFloat(
            $('input[name="delivery_type"]:checked')
                .attr("data-delivery-price")
                .replaceAll(",", "")
        );
    }

    totalPrice = totalproductPrice + deliveryPrice;

    // show result to html tags
    $("#delivery-price").html(priceFormat(deliveryPrice));
    $("#payment-price").html(priceFormat(totalPrice));
}

// convert number to price formet
function priceFormat(number) {
    number = new Intl.NumberFormat().format(number);
    return number;
}

// check hame me recipient in add address modal
function checkRecipientMe() {
    if ($("#receiver:checked").length > 0) {
        $("input#first_name").removeAttr("name");
        $("input#first_name").attr("disabled", "disabled");
        $("input#last_name").removeAttr("name");
        $("input#last_name").attr("disabled", "disabled");
        $("input#mobile").removeAttr("name");
        $("input#mobile").attr("disabled", "disabled");
    } else {
        $("input#first_name").attr("name", "recipient_first_name");
        $("input#first_name").removeAttr("disabled");
        $("input#last_name").attr("name", "recipient_last_name");
        $("input#last_name").removeAttr("disabled");
        $("input#mobile").attr("name", "mobile");
        $("input#mobile").removeAttr("disabled");
    }
}
