function emailShow() {
    $("#login-input-lable").html("لطفا ایمیل خود را وارد کنید");
    $(".login-input-text").removeClass("mobile");
    $("#login-mobile-tab").removeClass("active");
    $("#login-email-tab").addClass("active");

    $("#change-input").html("");
    if (!$("#change-input").children().hasClass("email")) {
        let checkError = '';
        if(emailError != ''){ 
            checkError = `data-error="error"`;
        }
        $("#change-input").append(`
        <input style="direction: ltr" class="text-end email" ` + checkError + `type="email" name="email" id="email" value="`+isEmail+`" placeholder="example@gmail.com" autofocus required>
       
        `+emailError);
    }
}

function mobileShow() {
    $("#login-input-lable").html("لطفا شماره موبایل خود را وارد کنید");
    $(".login-input-text").addClass("mobile");
    $("#login-email-tab").removeClass("active");
    $("#login-mobile-tab").addClass("active");

    $("#change-input").html("");
    if (!$("#change-input").children().hasClass("mobile")) {
        let checkError = '';
        if(mobileError != ''){ 
            checkError = `data-error="error"`;
        }
        $("#change-input").append(`
        <input style="direction: ltr" class="text-end mobile" `+checkError+` type="text" name="mobile" id="mobile" value="`+isMobile+`" placeholder="(9××) ×××-×××" autofocus required>
         `+mobileError);
    }
}
