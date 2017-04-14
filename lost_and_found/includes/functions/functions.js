$(document).ready(function() {

    $('#example tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });

    $("#state").change(function()
    {
    var id=$("#state").val();
    var dataString = 'id='+ id;

    $.ajax
    ({
    type: "POST",
    url: "../admin_area/location/getlocation.php",
    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#city").html(html);
    }
    });

    });


});
