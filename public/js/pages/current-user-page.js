// Set the CSRF token in the headers for every Ajax request
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.profile-picture-option').on('click', function () {
    // Get the URL from the data-url attribute
    const url = $(this).data('url');

    // Make the Ajax request
    $.ajax({
        url: url,
        type: 'POST',
        success: function (response) {
            console.log(response.message);
            window.location.reload();
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    });
});