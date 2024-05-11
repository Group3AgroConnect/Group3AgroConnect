$(document).ready(function() {
    $('#feedbackForm').on('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Serialize form data to send to the server
        const formData = $(this).serialize();

        // AJAX POST request to submit feedback
        $.ajax({
            url: 'submit_feedback.php', // PHP script to handle form data
            type: 'POST',
            data: formData, // Serialized form data
            success: function(response) {
                // Display the server response in the feedbackResponse div
                $('#feedbackResponse').html(response);
            },
            error: function(xhr, status, error) {
                $('#feedbackResponse').html("Error: Unable to submit feedback at this time.");
            }
        });
    });
});