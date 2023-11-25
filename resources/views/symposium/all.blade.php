<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forum Rooms</title>

    <link rel="stylesheet" href="{{ asset('css/libraries/bootstrap-5.3.2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/symposiums-all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/main.css') }}">
    
    <script src="{{ asset('js/jquery-3.7.1.js') }}" defer></script>
</head>
<body>

    @include('partials.header', ['title' => 'Forum symposiums', 'button_title' => 'Create new symposium'])

    @include('partials.pagination', ['title' => 'Forum symposiums', 'button_title' => 'Create new symposium'])

    <main>
        <a class="forum-room" href="{{ route('symposium', ['symposium_id' => 1]) }}">
            <div class="room-content">
                <h2>Room 1</h2>
                <p>Description for Room 1.</p>
            </div>
            <div class="room-details">
                <p>Created: September 1, 2023</p>
                <p>Last Message: September 5, 2023</p>
                <p>Total Messages: 50</p>
            </div>
        </a>

        <a class="forum-room" href="{{ route('symposium', ['symposium_id' => 2]) }}">
            <div class="room-content">
                <h2>Room 2</h2>
                <p>Description for Room 2.</p>
            </div>
            <div class="room-details">
                <p>Created: August 15, 2023</p>
                <p>Last Message: August 20, 2023</p>
                <p>Total Messages: 30</p>
            </div>
        </a>

        <a class="forum-room" href="{{ route('symposium', ['symposium_id' => 3]) }}">
            <div class="room-content">
                <h2>Room 3</h2>
                <p>Description for Room 3.</p>
            </div>
            <div class="room-details">
                <p>Created: July 5, 2023</p>
                <p>Last Message: July 10, 2023</p>
                <p>Total Messages: 25</p>
            </div>
        </a>

        <a class="forum-room" href="{{ route('symposium', ['symposium_id' => 4]) }}">
            <div class="room-content">
                <h2>Room 4</h2>
                <p>Description for Room 4.</p>
            </div>
            <div class="room-details">
                <p>Created: July 6, 2023</p>
                <p>Last Message: July 10, 2023</p>
                <p>Total Messages: 28</p>
            </div>
        </a>
    </main>

</body>
</html>
