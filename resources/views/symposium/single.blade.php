<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forum Rooms</title>

    <link rel="stylesheet" href="{{ asset('css/libraries/bootstrap-5.3.2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/symposium-single.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/main.css') }}">
    
    <script src="{{ asset('js/jquery-3.7.1.js') }}" defer></script>
</head>
<body>

    @include('partials.header', ['title' => 'Symposium '.$name.' messages', 'button_title' => 'Back to symposiums', 'button_link' => route('all-symposiums')])

    @include('partials.pagination', ['title' => 'Forum symposiums', 'hide_searсh' => true])

    <main>
        <div class="message-container">
            <div class="user-info">
                <img src="https://picsum.photos/400/400" alt="User Avatar" class="user-avatar">
                <div>
                    <h3>User Name</h3>
                    <span class="user-rating">Rating: 4.5</span>
                </div>
            </div>
            <div class="message-details">
                <p>Posted on: January 1, 2023</p>
            </div>
            <div class="message-content">
                <p>This is the forum room message content. It can contain multiple lines and additional details.</p>
            </div>
        </div>

        <div class="message-container">
            <div class="user-info">
                <img src="https://picsum.photos/400/400" alt="User Avatar" class="user-avatar">
                <div>
                    <h3>User Name</h3>
                    <span class="user-rating">Rating: 4.5</span>
                </div>
            </div>
            <div class="message-details">
                <p>Posted on: January 1, 2023</p>
            </div>
            <div class="message-content">
                <p>This is the forum room message content. It can contain multiple lines and additional details.</p>
            </div>
        </div>

        <form class="new-message-form" action="#" method="post">
            <textarea name="new-message" id="new-message" rows="4" placeholder="Type your message here..." required></textarea>
            <button type="submit" class="post-button">Post</button>
        </form>

    </main>


</body>
</html>
