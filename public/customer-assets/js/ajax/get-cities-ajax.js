$(document).ready(function () {
    if ($("#province option:selected").val() != "استان را انتخاب کنید") {
        getCitiesAjax();
    }
});
$("#province").change(function () {
    getCitiesAjax();
});

function getCitiesAjax() {
    var url = $("#province option:selected").attr("data-url"),
        old = $("#city").attr("data-old");

    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
            if (response.status) {
                let cities = response.cities;
                $("#city").empty();
                $("#city").append(
                    $("<option/>")
                        .attr("selected", "selected")
                        .attr("disabled", "disabled")
                        .text("شهر را انتخاب کنید")
                );
                
                // order by name cities
                cities = cities.sort((a, b) => {
                    if (a.name < b.name) {
                        return -1;
                    }
                });

                cities.map((city) => {
                    if (old == city.id) {
                        $("#city").append(
                            $("<option/>")
                                .val(city.id)
                                .text(city.name)
                                .attr("selected", "selected")
                        );
                    } else {
                        $("#city").append(
                            $("<option/>").val(city.id).text(city.name)
                        );
                    }
                });
            } else {
                // errorToast('خطایی رخ داده است مجدداً تلاش فرمایید');
            }
        },
        error: function () {
            // errorToast("خطایی رخ داده است مجدداً تلاش فرمایید");
        },
    });
}
