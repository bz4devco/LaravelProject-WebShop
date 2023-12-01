function gnetareDiscountCode(btncopy = ''){
    let genCode = '';
    let length = 7;
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const charactersLength = characters.length;
    let counter = 0;
    while (counter < length) {
        genCode += characters.charAt(Math.floor(Math.random() * charactersLength));
        counter += 1;
    }
    $('.generate-discount-code').val(genCode);
 

    if(btncopy != ''){

        // check for is generate code and transter to input and not null
        if( $('.generate-discount-code').val() !== null && $('.generate-discount-code').val() !== ''){
            $('#'+btncopy).removeClass('disabled');
            $('#'+btncopy).html('کپی کد تخفیف');
            $('#'+btncopy).removeClass('btn-outline-success');
            $('#'+btncopy).addClass('btn-secondary');
        }else{
            $('#'+btncopy).addClass('disabled');
        }
    }
}
