function resendCodeAjax(url) {
    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
            if (response.resend) {
               return true; 
            } else {
               return true;
            }
        },
        error: function () {
            return false;
        },
    });

}
