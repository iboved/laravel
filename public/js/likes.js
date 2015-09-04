$(document).ready(function() {
    $('#like').click(function() {


        if ($(this).hasClass('btn btn-primary')) {
            $(this).removeClass('btn btn-primary');
            $(this).addClass('btn btn-danger');
            $(this).html('Dislike');
        } else {
            $(this).removeClass('btn btn-danger');
            $(this).addClass('btn btn-primary');
            $(this).html('Like');
        }
    });
});


//$.ajax({
//    type: "GET",
//    url: "/questions/{slug}/like"
//});