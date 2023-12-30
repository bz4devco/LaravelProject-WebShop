$(document).ready(function() {
    startTimer();
});

function startTimer() {

    $('#resend-code').html(`
    <span id="resend-timer"></span> مانده تا دریافت مجدد کد
    `);

    var time = 3 // time to countdown
    var countDownDate = new Date().getTime() + (time * 60 * 1000); // 3 minutes from now
    
    // timer
    var timer = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        $('#resend-timer').text(minutes + ":" + seconds);

        
        // give expired text by down
        if (distance < 0) {
            clearInterval(timer);
            $('#resend-code').html(`
                <a href="javascript:void(0)"  id="resend-btn" onclick="resendCode()" class="text-decoration-none" >ارسال مجدد کد تایید</a>
            `);
        }
    }, 1000);
    
    
}


function resendCode(){

    let url = $('#resend-code').attr('data-url');
    resendCodeAjax(url);

    // reset by click on DOM
    $('#resend-code').html(`
    <span id="resend-timer"></span> مانده تا دریافت مجدد کد
    `);
    startTimer();

}