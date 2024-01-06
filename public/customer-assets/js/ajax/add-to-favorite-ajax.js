// ajax for products in cards slider
$('.product-add-to-favorite button').click(function(){
    var url = $(this).attr('data-url'),
        el  = $(this); 
    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
            if (response.status == 1) {
                el.children().first().addClass('text-danger');
                el.attr('title', 'حذف از علاقه مندی');
                el.attr('data-bs-original-title', 'حذف از علاقه مندی');
                el.blur();
            } 
            else if(response.status == 2) {
                el.children().first().removeClass('text-danger');
                el.attr('title', 'افزودن به علاقه مندی');
                el.attr('data-bs-original-title', 'افزودن به علاقه مندی');
                el.attr('aria-label', 'افزودن به علاقه مندی');
                el.blur();
            }
            else if(response.status == 3) {
                $('.toast').toast('show');
            }
        },
        error: function () {
            el.find('i').removeClass('text-danger');
            el.attr('title', 'افزودن به علاقه مندی');
            el.attr('data-bs-original-title', 'افزودن به علاقه مندی');
            el.attr('aria-label', 'افزودن به علاقه مندی');
            el.blur();
        },
    });
});

// ajax for product in product detail 
$('.add-to-favorite-btn button').click(function(){
    var url = $(this).attr('data-url'),
        el  = $(this); 
    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
            if (response.status == 1) {
                el.html(`
                <i class="fa fa-heart"></i> حذف از علاقه مندی
                `);
                el.blur();
            } 
            else if(response.status == 2) {
                el.html(`
                <i class="fa fa-heart text-danger"></i> افزودن به علاقه مندی 
                `);
                el.blur();
            }
            else if(response.status == 3) {
                $('.toast').toast('show');
            }
        },
        error: function () {
            el.html(`
            <i class="fa fa-heart text-danger"></i> افزودن به علاقه مندی 
            `);
            el.blur();
        },
    });
});