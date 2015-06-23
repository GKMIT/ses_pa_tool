
( function ( $ )  {

    $.loader_add = function() {
        var loader_wrapper = "<div class='loader-wrapper'><div class='image-wrapper'><img src='assets/img/loading.gif' /> &nbsp;&nbsp;Loading...</div></div>";
        $("body").append(loader_wrapper);
    }

    $.loader_remove = function() {
        $("body").find(".loader-wrapper").remove();
    }

} ( jQuery ) );