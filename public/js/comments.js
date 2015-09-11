$(document).ready(function() {
    $('#addAnswerForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function(data) {
                console.log(data);

                var html = $('<div />')
                    .addClass('panel')
                    .addClass('panel-default')
                    .append(
                    $('<div />')
                        .addClass('panel-body')
                        .append('<h5>Author</h5>')
                        .append('Name: ' + data.user.name + ' | Email: <a href="mailto:#">' + data.user.email + '</a> <br>')
                        .append('Answer: ' + data.description)
                        .append('<p>Created at: ' + data.created_at + '</p>')
                        .append(
                        $('<div />')
                            .attr('align', 'right')
                            .append(
                            $('<a />')
                                .addClass('delete-answer')
                                .on('click', deleteComment)
                                .attr('href', '/questions/' + data.question.slug + '/answer/' + data.id)
                                .text('Delete')
                            )
                        )
                    );

                $('#answer-list').prepend(html);

                $('#addAnswerForm')[0].reset();
            }
        });
    });

    $('.delete-answer').on('click', deleteComment);

    function deleteComment(e) {
        e.preventDefault();

        var self = $(this);

        $.ajax({
            type: "DELETE",
            url: $(this).attr('href'),
            success: function() {
                self.closest('.panel.panel-default').fadeOut();
            }
        });
    }
});
