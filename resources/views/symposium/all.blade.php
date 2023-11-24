<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forum Rooms</title>

    <link rel="stylesheet" href="{{ asset('css/libraries/bootstrap-5.3.2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/symposiums-all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/main.css') }}">
    
    <script src="{{ asset('js/jquery-3.7.1.js') }}" defer></script>
</head>
<body>
    <header>
        <h1>
            Forum Rooms<br>
            <button class="create-room-button">Create New Room</button>
        </h1>
        <div class="header-buttons">
            <a href="#">Profile</a>
            <a href="#" class="hidden">Login</a>
        </div>
        <div class="main-page-container">
            <a href="{{ route('home') }}">Main page</a>
        </div>
    </header>

        <div class="pagination">
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <!-- Add more pagination links as needed -->
        </div>

    <main>
        <div class="forum-room">
            <div class="room-content">
                <h2>Room 1</h2>
                <p>Description for Room 1.</p>
            </div>
            <div class="room-details">
                <p>Created: September 1, 2023</p>
                <p>Last Message: September 5, 2023</p>
                <p>Total Messages: 50</p>
            </div>
        </div>

        <div class="forum-room">
            <div class="room-content">
                <h2>Room 2</h2>
                <p>Description for Room 2.</p>
            </div>
            <div class="room-details">
                <p>Created: August 15, 2023</p>
                <p>Last Message: August 20, 2023</p>
                <p>Total Messages: 30</p>
            </div>
        </div>

        <div class="forum-room">
            <div class="room-content">
                <h2>Room 3</h2>
                <p>Description for Room 3.</p>
            </div>
            <div class="room-details">
                <p>Created: July 5, 2023</p>
                <p>Last Message: July 10, 2023</p>
                <p>Total Messages: 25</p>
            </div>
        </div>

        <div class="forum-room">
            <div class="room-content">
                <h2>Room 3</h2>
                <p>Description for Room 3.</p>
            </div>
            <div class="room-details">
                <p>Created: July 5, 2023</p>
                <p>Last Message: July 10, 2023</p>
                <p>Total Messages: 25</p>
            </div>
        </div>

        <!-- Add more forum rooms as needed -->

    </main>

    <!-- Search bar -->
    <div class="search-bar">
        <input type="text" class="search-input" placeholder="Search...">
        <button class="search-button">Search</button>
    </div>

</body>
</html>
