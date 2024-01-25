// fonctions area
function removeAllSidbarToggleClass() {
    $("#sidbar-toggle-hide").removeClass("d-md-inline");
    $("#sidbar-toggle-hide").removeClass("d-none");
    $("#sidbar-toggle-show").removeClass("d-inline");
    $("#sidbar-toggle-show").removeClass("d-md-none");
}
function ToggleOffClass() {
    $("#sidbar-toggle-hide").addClass("d-none");
    $("#sidbar-toggle-show").removeClass("d-none");
}
function ToggleOnClass() {
    $("#sidbar-toggle-show").addClass("d-none");
    $("#sidbar-toggle-hide").removeClass("d-none");
}

function toggleFullScreen() {
    if (
        (document.fullScreenElement && document.fullScreenElement !== null) ||
        (!document.mozFullScreen && !document.webkitIsFullScreen)
    ) {
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webKitRequestFullScreen) {
            document.documentElement.webKitRequestFullScreen(
                Element.ALLOW_KEYBOARD_INPUT
            );
        }

        $("#screen-compress").removeClass("d-none");
        $("#screen-expand").addClass("d-none");
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }

        $("#screen-compress").addClass("d-none");
        $("#screen-expand").removeClass("d-none");
    }
}
// fonctions area

$(document).ready(function () {
    // toggle for right sidebar in page
    $("#sidbar-toggle-hide").click(function () {
        $("#main-sidebar").fadeOut(300);
        $("#main-body").animate({ width: "100%" }, 300);
        setTimeout(() => {
            removeAllSidbarToggleClass();
            ToggleOffClass();
        }, 300);
    });

    $("#sidbar-toggle-show").click(function () {
        $("#main-sidebar").fadeIn(300);
        $("#main-body").animate({ width: "calc(100% - 14rem)" }, 300);
        setTimeout(() => {
            removeAllSidbarToggleClass();
            ToggleOnClass();
        }, 300);
    });
    // toggle for right sidebar in page

    //  toggle header menu
    $("#menu-toggle").click(function () {
        $("#header-body").toggle(300);
    });
    //  toggle header menu

    // toggle sreach bar in header
    $("#search-toggle").click(function () {
        $(this).removeClass("d-md-inline");
        $("#search-area").addClass("d-md-inline");
    });
    $("#search-toggle").click(function () {
        $(this).removeClass("d-md-inline");
        $("#search-area").addClass("d-md-inline");
        $("#search-input").animate({ width: "11rem" }, 300);
    });

    $("#search-area-hide").click(function () {
        $("#search-input").animate({ width: "0" }, 300);
        setTimeout(() => {
            $("#search-area").removeClass("d-md-inline");
            $("#search-toggle").addClass("d-md-inline");
        }, 300);
    });
    // toggle sreach bar in header
    // toggle header notfications
    $("#header-notification-toggle").click(function () {
        $("#header-notification").fadeToggle();
    });
    // toggle header notfications

    // toggle header commetns
    $("#header-comment-toggle").click(function () {
        $("#header-comment").fadeToggle();
    });
    // toggle header commetns

    // toggle header commetns
    $("#header-profile-toggle").click(function () {
        $("#header-profile").fadeToggle();
    });
    // toggle header commetns

    // toggle sidebar dropdown menu
    $(".sidebar-group-link").click(function () {
        if (!$(this).hasClass("sidebar-group-link-active")) {
            // *** close all dorpdowns after click ***
            $(".sidebar-group-link").removeClass("sidebar-group-link-active");
            $(".sidebar-group-link")
                .children(".sidebar-dropdown-toggle")
                .children(".angle")
                .removeClass("fa-angle-down");
            $(".sidebar-group-link")
                .children(".sidebar-dropdown-toggle")
                .children(".angle")
                .addClass("fa-angle-left");

            // *** actice dropdown after this element click ***

            $(this).addClass("sidebar-group-link-active");
            $(this)
                .children(".sidebar-dropdown-toggle")
                .children(".angle")
                .removeClass("fa-angle-left");
            $(this)
                .children(".sidebar-dropdown-toggle")
                .children(".angle")
                .addClass("fa-angle-down");
        } else {
            $(this).removeClass("sidebar-group-link-active");
            $(this)
                .children(".sidebar-dropdown-toggle")
                .children(".angle")
                .removeClass("fa-angle-down");
            $(this)
                .children(".sidebar-dropdown-toggle")
                .children(".angle")
                .addClass("fa-angle-left");
        }
    });


    // show sidebar part title when has sidebar dropdown
    $('#markets-section + .sidebar-group-link').length > 0 || $('#markets-section + a').length > 0 ? $('#markets-section').show() : $('#markets-section').remove();
    $('#products-section .sidebar-dropdown a').length > 0 ? $('#products-section').show() : $('#products-section').remove();
    $('#order-section .sidebar-dropdown a').length > 0 ? $('#order-section').show() : $('#order-section').remove();
    $('#payments-section .sidebar-dropdown a').length > 0 ? $('#payments-section').show() : $('#payments-section').remove();
    $('#dicounts-section .sidebar-dropdown a').length > 0 ? $('#dicounts-section').show() : $('#dicounts-section').remove();
    
    $('#contents-section + a').length > 0 || $('#contents-section + .sidebar-group-link').length > 0 ? $('#contents-section').show() : $('#contents-section').remove();

    $('#roles-section .sidebar-dropdown a').length > 0 ? $('#roles-section').show() : $('#roles-section').remove();
    
    $('#tickets-section + a').length > 0 || $('#tickets-section + .sidebar-group-link').length > 0 ? $('#tickets-section').show() : $('#tickets-section').remove();
    
    $('#notifies-section + a').length > 0 || $('#notifies-section + .sidebar-group-link').length > 0 ? $('#notifies-section').show() : $('#notifies-section').remove();
    
    $('#settings-section + a').length > 0 || $('#settings-section + .sidebar-group-link').length > 0 ? $('#settings-section').show() : $('#settings-section').remove();
    
    $('#users-section + a').length > 0 || $('#users-section + .sidebar-group-link').length > 0 ? $('#users-section').show() : $('#users-section').remove();

    // show sidebar part title when has sidebar dropdown
});
// toggle sidebar dropdown menu

// toggle fullscreen mode
$("#full-screen").click(function () {
    toggleFullScreen();
});
// toggle fullscreen mode


