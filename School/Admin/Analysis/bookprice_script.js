$(document).ready(function() {
    $('form').submit(function(e) {
        e.preventDefault(); // Prevent the form from submitting normally
        var formData = $(this).serialize(); // Serialize the form data
        $.ajax({
            type: 'POST',
            url: 'bookprice_query.php',
            data: formData,
            success: function(response) {
                $('tbody').html(response); // Update the table body with the response data
            }
        });
    });
});
