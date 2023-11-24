<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roman Republic Forum</title>

    <link rel="stylesheet" href="{{ asset('css/libraries/bootstrap-5.3.2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/main-page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/main.css') }}">
    
    <script src="{{ asset('js/jquery-3.7.1.js') }}" defer></script>
</head>
<body>
    <div id="first-block">
        <!-- Content for the first block -->
        <h1>Welcome to Forum of {{ $city_name }}</h1>
        <div class="user-box header-button">
            <a href="{{ route('current-user-page') }}">Username</a>
        </div>
        <div class="user-box header-button hidden">
            <a href="login.html">Login</a>
        </div>
    </div>
    <div class="link-block-container">
        <a id="second-block"  href="{{ route('all-symposiums') }}">
            <h2>Symposiums</h2>
        </a>
        <a id="third-block" href="{{ route('all-suffragiums') }}">
            <h2>Suffragiums</h2>
        </a>
        <a id="fourth-block" href="{{ route('top-rating') }}">
            <h2>Arcus triumphalis</h2>
        </a>
    </div>
</body>
</html>
