$(document).ready(function() {
    $('.delete-question').on('click', function(e) {
        e.preventDefault();

        var self = $(this);

        $.ajax({
            type: "DELETE",
            url: $(this).attr('href'),
            success: function() {
                self.closest('.question-block').hide();

                var html = $('<div />')
                    .addClass('alert')
                    .addClass('alert-success')
                    .text('Question deleted!');

                $('.question-full').prepend(html).hide().show("slow");
            }
        });
    });
});
