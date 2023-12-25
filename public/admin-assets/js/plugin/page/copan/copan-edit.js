// persian date picker set input val
let startDateTime = new persianDate(
    parseInt($("#startdate_altField").val())
).format("YYYY/MM/DD hh:mm:ss");
$("#startdate").val(startDateTime);

let endDateTime = new persianDate(
    parseInt($("#enddate_altField").val())
).format("YYYY/MM/DD hh:mm:ss");
$("#enddate").val(endDateTime);



///////////////////////////////////////////



// change status user choise on change type selected
$(document).ready(function () {
    if ($("#type").find(":selected").val() == "1") {
        $("#user_id").removeAttr("disabled");
    } else {
        $("#user_id").attr("disabled", "disabled");
        $("#user_id").find("option").removeAttr("selected");
        $(".defualt").attr("selected", "selected");
    }
});
$("#type").change(function () {
    if ($("#type").find(":selected").val() == "1") {
        $("#user_id").removeAttr("disabled");
    } else {
        $("#user_id").attr("disabled", "disabled");
        $("#user_id").find("option").removeAttr("selected");
        $(".defualt").attr("selected", "selected");
    }
});




//////////////////////////////////////////


// toggle inputs amount Percentage type and Price type on change amount type
$(document).ready(function () {
    if ($("#amount_type").find(":selected").val() == "1") {
        $("#flex-state").html(isPrice);
        isMoney();
    } else {
        $("#flex-state").html(isPercentage);
    }
});
$("#amount_type").change(function () {
    if ($("#amount_type").find(":selected").val() == "1") {
        $("#flex-state").html(isPrice);
        isMoney();
    } else {
        $("#flex-state").html(isPercentage);
    }
});
