<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forum - user account</title>

    <link rel="stylesheet" href="{{ asset('css/libraries/bootstrap-5.3.2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/login-page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/main.css') }}">
    
    <script src="{{ asset('js/jquery-3.7.1.js') }}" defer></script>

</head>
<body>

    @include('partials.header', ['title' => 'Login to an account', 'button_title' => '', 'hide_auth_buttons' => true])

    <main>
        <div class="login-container">
            <h2>Login</h2>
            <form action="#" method="post">
                <label>
                    Email/Login:
                    <input type="text" id="email" name="email" required>
                </label>
                <label>
                    Password:
                    <input type="password" id="password" name="password" required>
                </label>

                <button type="submit" class="login-button">Login</button>
            </form>

            <div class="register-link">
                <p>Don't have an account? <a href="{{ route('register-page') }}">Register here</a></p>
            </div>
        </div>
    </main>

</boy>