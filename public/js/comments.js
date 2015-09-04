$(document).ready(function() {
    $('#testform').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function(data){

                alert(data);
            }
        });
    });
});