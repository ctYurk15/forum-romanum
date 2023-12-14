<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Forum - user account</title>

    <link rel="stylesheet" href="{{ asset('css/libraries/bootstrap-5.3.2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/user-page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/main.css') }}">
    
    <script src="{{ asset('js/jquery-3.7.1.js') }}" defer></script>
</head>
<body>

    @include('partials.header', ['title' => 'User account details', 'button_title' => ''])
    
    <div class="user-details-container">
        <div class="user-profile">
            @if ($user->photo_path == "")
                <img src="{{ asset('img/profile-pictures/no_profile.png') }}" alt="Profile Picture">
            @else
                <img src="{{ asset('img/profile-pictures/'.$user->photo_path) }}" alt="Profile Picture">
            @endif
        </div>
        <div class="user-data">
            <h2>User Account Details</h2>
            <table>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Registration Date</th>
                    <td>{{ $user->created_at }}</td>
                </tr>
                <tr>
                    <th>
                        User Rating
                    </th>
                    <td>
                        @if ($user->rating > 0)
                            <span style="color: green">+{{ $user->rating }}</span>
                        @elseif ($user->rating < 0)
                            <span style="color: red">{{ $user->rating }}</span>
                        @else
                            <span>{{ $user->rating }}</span>
                        @endif
                    </td>
                </tr>
            </table>
            <br>
            @if (!$userHasVoted)
                <button class="btn btn-success updateRating" data-url="{{ route('update-rating', ['userId' => $user->id, 'action' => 'increment']) }}">+1 to Rating</button>
                <button class="btn btn-danger updateRating" data-url="{{ route('update-rating', ['userId' => $user->id, 'action' => 'decrement']) }}">-1 from Rating</button>
            @else
                <p>You have voted: {{ $vote->vote_type == 'upvote' ? "+1 to Rating" : "-1 to Rating" }}</p>
                <form method="post" action="{{ route('remove-vote', ['votedUserId' => $user->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-warning">Remove Vote</button>
                </form>
            @endif
        </div>
    </div>

</body>

<script src="{{ asset('js/pages/user-page.js') }}" defer></script>
    