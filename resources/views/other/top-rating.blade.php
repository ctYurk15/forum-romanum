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

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
        }

        main {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 10px;
            padding: 10px;
            margin: 0 auto;
            box-sizing: border-box;
        }

        .user-card {
            width: calc(20% - 10px); /* 20% width with 10px gap */
            min-height: 200px; /* Increased height to accommodate name and rating */
            background-color: #fff;
            border: 1px solid #ddd;
            overflow: hidden;
            transition: box-shadow 0.3s ease;
            cursor: pointer;
            display: flex;
            flex-direction: column;
        }

        .user-card:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .user-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .user-details {
            background-color: #ddd;
            padding: 15px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .user-photo {
            width: 100%;
            height: 100%; /* Take 100% of the height of the container */
            object-fit: cover;
        }

        .user-name {
            margin: 5px 0 10px;
            font-size: 1.2em;
            color: #333;
        }

        .user-rating {
            margin: 5px 0 0;
            color: #555;
        }

        .rating-page-page-title {
            margin: 0;
            text-align: center;
            padding: 20px 0;
            color: #333;
            background-color: #f9f9f9;
            border-bottom: 2px solid #ddd;
        }
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