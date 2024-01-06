$(document).ready(function () {
    bill();

    // input color
    $('input[name="color"]').change(function () {
        bill();
    });

    // guarantee
    $('select[name="guarantee"]').change(function () {
        bill();
    });

    // guarantee
    $(".cart-number").click(function () {
        bill();
    });
});

function bill() {
    let selectedColor ='';
    // check has this checked input color
    if ($('input[name="color"]:checked').length != 0) {
        selectedColor = $('input[name="color"]:checked');
        $("#selected_color_name").html(selectedColor.attr("data-color-name"));
    }
    
    //price computing
    let selectedColorPrice = 0,
        selectedGuaranteePrice = 0,
        number = 1,
        productDiscoutPrice = 0,
        productOrginalPrice = parseFloat($('#product-price').attr('data-product-orginal-price').replaceAll(',', ''));

        // check change color price
        if($('input[name="color"]:checked').length != 0){
            selectedColorPrice = parseFloat(selectedColor.attr('data-product-color-price').replaceAll(',', ''));
        }
        
        // check change guarantee price
        if($('#guarantee option:selected').length != 0){
            selectedGuaranteePrice = parseFloat($('#guarantee option:selected').attr('data-product-guarantee-price').replaceAll(',', ''));
        }
        
        // check change number price
        if($('#number').val() > 0){
            number = parseFloat($('#number').val());
        }
        
        // check change number price
        if($('#product-discount').length != 0){
            productDiscoutPrice = parseFloat($('#product-discount').attr('data-product-discount-price').replaceAll(',', ''));
        }

        /////////////////////////////////////
        // final price
        let productPrice = selectedColorPrice + productOrginalPrice + selectedGuaranteePrice,
            productDiscount = number * productDiscoutPrice;
            finalPrice = number * (productPrice - productDiscoutPrice);
        
        // show result to html tags
        $('#product-price').html(priceFormat(productPrice));
        $('#product-discount').html(priceFormat(productDiscount));
        $('#final-price').html(priceFormat(finalPrice));
}


// convert number to price formet
function priceFormat(number){
    number = new Intl.NumberFormat().format(number);
    return number;
}