import "./bootstrap";



$(document).ready(function () {
    $("#btn").click(function () {
        if($("#text").is(":visible")) {
            $("#text").slideUp()
            $("#btn").text("Show Text")
        } else {
            
            
            $("#btn").text("Hide Text")
            $("#text").slideDown()
        }
    });
});

