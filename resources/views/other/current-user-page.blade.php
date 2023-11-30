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
            <table>
                <tr>
                    <th>Username</th>
                    <td>JohnDoe123</td>
                </tr>
                <tr>
                    <th>User's Phone</th>
                    <td>(123) 456-7890</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>johndoe@example.com</td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>John Doe</td>
                </tr>
                <tr>
                    <th>Registration Date</th>
                    <td>2023-01-01</td>
                </tr>
                <tr>
                    <th>User Rating</th>
                    <td>+ 42</td>
                </tr>
                <!-- Add more user data as needed -->
            </table>
        </div>
    </div>

</boy>