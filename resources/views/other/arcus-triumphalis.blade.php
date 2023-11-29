<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forum Rooms</title>

    <link rel="stylesheet" href="{{ asset('css/libraries/bootstrap-5.3.2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/arcus-triumphalis.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/main.css') }}">
    
    <script src="{{ asset('js/jquery-3.7.1.js') }}" defer></script>
    </style>
</head>
<body>

    @include('partials.header', ['title' => 'Arcus triumphalis', 'button_title' => ''])

    <h1 class="rating-page-page-title">Top 10 Users</h1>

    <main>
        <!-- User cards go here -->
        @foreach($topUsers as $user)
            <div class="user-card">
                <div class="user-content">
                    <img src="{{ $user['profile_photo'] }}" alt="Profile Photo" class="user-photo">
                    <h2 class="user-name">{{ $user['name'] }}</h2>
                    <p class="user-rating">Rating: {{ $user['rating'] }}</p>
                </div>
                <div class="user-details">
                    <div>Joined: {{ $user['join_date'] }}</div>
                    <!-- Add more user details as needed -->
                </div>
            </div>
        @endforeach
    </main>

</boy>