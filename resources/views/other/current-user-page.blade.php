<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            <img src="https://picsum.photos/600/600" alt="Profile Picture">
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

</boy>