$(document).ready(function() {
    $('.updateRating').click(function() {
        var url = $(this).data('url');
        updateRating(url);
    });

    function updateRating(url) {
        // Get the CSRF token from the meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $.ajax({
            type: 'PATCH',
            url: url,
            success: function(response) {
                console.log(response);
                window.location.reload();
            },
            error: function(error) {
                console.error(error);
                // Handle error, e.g., show an error message
            }
        });
    }
});