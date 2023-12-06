function changeStatus(id) {
    let element = $('#' + id),
        url = element.attr("data-url"),
        elementValue = !element.prop("checked");

    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
            if (response.status) {
                if (response.checked) {
                    element.prop("checked", true);
                    successToast(
                        "وضعیت فیلد شماره " + response.id + " با موفقیت فعال شد"
                    );
                } else {
                    element.prop("checked", false);
                    successToast(
                        "وضعیت فیلد شماره " +
                            response.id +
                            " با موفقیت غیر فعال شد"
                    );
                }
            } else {
                element.prop("checked", elementValue);
                errorToast("هنگام ویرایش مشکلی بوجود آمده است");
            }
        },
        error: function () {
            element.prop("checked", elementValue);
            errorToast("ارتباط با سرور برقرار نشد");
        },
    });

    function successToast(message) {
        $(".toast-wrapper").attr("style", "display: unset");
        let successToastTag =
            '<div class="toast bg-custom-green text-white shadow mb-2 fade" data-bs-animation="true" style="transition:  0.2s all;">\n' +
            '<div class="toast-header bg-custom-green text-white">\n' +
            '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>\n' +
            '<strong class="mt-2">\n' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">\n' +
            '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>\n' +
            "</svg>\n" +
            "عملیات موفقیت آمیز\n" +
            "</strong>\n" +
            "</div>\n" +
            '<div class="toast-body">\n' +
            message +
            "</div>\n" +
            "</div>";

        $(".toast-wrapper").append(successToastTag);
        $(".toast")
            .toast("show")
            .delay(5500)
            .queue(function () {
                $(this).remove();
                if ($(".toast-wrapper").children().length == 0) {
                    $(".toast-wrapper").attr(
                        "style",
                        "display: none!important"
                    );
                }
            });
    }

    function errorToast(message) {
        $(".toast-wrapper").attr("style", "display: unset");
        let errorToastTag =
            '<div class="toast bg-danger text-white shadow mb-2 fade" data-bs-animation="true" style="transition:  0.2s all;">\n' +
            '<div class="toast-header bg-danger text-white">\n' +
            '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>\n' +
            '<strong class="mt-2">\n' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">\n' +
            '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>\n' +
            "</svg>\n" +
            "خطا\n" +
            "</strong>\n" +
            "</div>\n" +
            '<div class="toast-body">\n' +
            message +
            "</div>\n" +
            "</div>";

        $(".toast-wrapper").append(errorToastTag);
        $(".toast")
            .toast("show")
            .delay(5500)
            .queue(function () {
                $(this).remove();
                $(".toast-wrapper").attr("style", "display: none!important");
            });
    }
}
