// ajax for customer products rating
$('input[name="rating"]').click(function () {
    var url = $(this).attr("data-url"),
        el = $(this);
    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
            if (response.status == 1) {
                $("#rate-error").hide();
                $("#rate-error").html("");
                el.attr("checked", "checked");
                $("#cutomer-rate").html(
                    "از مجموع " +
                        new Intl.NumberFormat().format(response.rate) +
                        " امتیاز"
                );
            } else if (response.status == 2) {
                uncheckRadioButtons();
                $("#rate-error").show();
                $("#rate-error").html("کاربرگرامی; شما اجازه ثبت امتیاز ندارید ، باید محصول را خریداری کرده باشید");
            } else if (response.status == 3) {
                uncheckRadioButtons();
                $("#rate-error").show();
                $("#rate-error").html("امتیاز ارسال شده نا معتبر است");
            } else if (response.status == 4) {
                uncheckRadioButtons();
                $(".toast-rate").toast("show");
            }
        },
        error: function () {
            uncheckRadioButtons();
            $("#rate-error").show();
            $("#rate-error").html("مشکل در برقراری با سرور");
        },
    });
});

function uncheckRadioButtons() {
    var radioButtons = document.getElementsByName("rating");
    for (var i = 0; i < radioButtons.length; i++) {
        radioButtons[i].checked = false;
    }
}
