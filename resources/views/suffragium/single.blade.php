<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forum Rooms</title>

    <link rel="stylesheet" href="{{ asset('css/libraries/bootstrap-5.3.2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/suffragium-single.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/main.css') }}">
    
    <script src="{{ asset('js/jquery-3.7.1.js') }}" defer></script>

</head>
<body>

    @include('partials.header', ['title' => 'Suffragium '.$name, 'button_title' => 'Back to suffragiums', 'button_link' => route('all-suffragiums')])

    <div class="voting-container">
        <div class="voting-item">
            <span class="item-name">Item 1</span>
            <button class="vote-btn">Vote</button>
        </div>

        <div class="voting-item">
            <span class="item-name">Item 2</span>
            <button class="vote-btn">Vote</button>
        </div>

        <div class="voting-item">
            <span class="item-name">Item 3</span>
            <button class="vote-btn">Vote</button>
        </div>

        <!-- Add more items as needed -->
    </div>


</body>
</html>
