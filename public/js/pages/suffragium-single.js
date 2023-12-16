$(document).ready(function () {
    $('.vote-btn').on('click', function () {
        const optionId = $(this).data('option-id');
        const voteUrl = $(this).data('url');
        const csrfToken = $('meta[name="csrf-token"]').attr('content'); // Retrieve CSRF token from the meta tag

        // Make an AJAX request to vote for the option
        $.ajax({
            url: voteUrl,
            method: 'POST',
            data: { optionId },
            headers: {
                'X-CSRF-TOKEN': csrfToken // Include CSRF token in the request headers
            },
            success: function (response) {
                // Handle the response (e.g., update UI)
                console.log(response);

                window.location.reload();
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    });
});