$(document).ready(function() {
    $('#like').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: $(this).attr("href"),
            context: $('#like'),
            success: function(data) {
                //console.log(data);

                $('#likes-count').text('Likes: ' + data);

                if ($(this).hasClass('btn btn-primary')) {
                    $(this).removeClass('btn btn-primary');
                    $(this).addClass('btn btn-danger');
                    $(this).text('Dislike');
                } else {
                    $(this).removeClass('btn btn-danger');
                    $(this).addClass('btn btn-primary');
                    $(this).text('Like');
                }
            }
        });
    });
});
