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
            <div class="available-photos-cotnainers">
                @foreach($profile_images as $index => $profile_image)
                    <img src="{{ asset('img/profile-pictures/'.$profile_image) }}" 
                        @if ($profile_image == $user->photo_path)
                            class="selected-profile-picture"
                        @else
                            class="profile-picture-option" data-url="{{ route('set-profile-picture', ['picture_path' => $profile_image, 'user_id' => $user->id]) }}"
                        @endif
                    alt="Profile Picture">
                @endforeach
            </div>
        </div>
        <div class="user-data">
            <h2>User Account Details</h2>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <a class="logout-button" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                    Logout
                </a>
            </form>
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
        </div>
    </div>

</body>
    
<script src="{{ asset('js/pages/current-user-page.js') }}" defer></script>