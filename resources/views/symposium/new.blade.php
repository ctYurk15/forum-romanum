<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forum Rooms</title>

    <link rel="stylesheet" href="{{ asset('css/libraries/bootstrap-5.3.2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/symposium-new.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/main.css') }}">
    
    <script src="{{ asset('js/jquery-3.7.1.js') }}" defer></script>

</head>
<body>

    @include('partials.header', ['title' => 'Create new symposium ', 'button_title' => 'Back to symposiums', 'button_link' => route('all-symposiums')])

    <div class="new-room-container">
        <h2>Create a New Room</h2>
        <form  action="{{ route('symposium-save') }}" method="post">
            @csrf
            
            <label for="roomTitle">Room Title:</label>
            <input type="text" id="roomTitle" name="room_name" required>

            <label for="roomDescription">Room Description:</label>
            <textarea id="roomDescription" name="room_description" rows="4" required></textarea>

            <button type="submit">Create Room</button>
        </form>
    </div>

</body>
</html>
