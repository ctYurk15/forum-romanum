<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roman Republic Forum</title>

    <link rel="stylesheet" href="{{ asset('css/libraries/bootstrap-5.3.2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/main-page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/main.css') }}">
    
    <script src="{{ asset('js/jquery-3.7.1.js') }}" defer></script>
</head>
<body>
    <div id="first-block" style="background: url({{ asset('img/bgs/main-bg.jpg') }}) center/cover no-repeat;">
        <!-- Content for the first block -->
        <h1>Welcome to Forum of {{ $city_name }}</h1>
        
        @if (Illuminate\Support\Facades\Auth::check())
            <div class="user-box header-button">
                <a href="{{ route('current-user-page') }}">Profile</a>
            </div>
        @else
            <div class="user-box header-button">
                <a href="{{ route('login') }}">Login</a>
            </div>
        @endif
    </div>
    <div class="link-block-container">
        <a id="second-block"  href="{{ route('all-symposiums') }}"
            style="background: url('{{ asset('img/bgs/symposium.png') }}') center/cover no-repeat; ">
            <h2>Symposiums</h2>
        </a>
        <a id="third-block" href="{{ route('all-suffragiums') }}"
            style="background: url('{{ asset('img/bgs/suffragium.png') }}') center/cover no-repeat; ">
            <h2>Suffragiums</h2>
        </a>
        <a id="fourth-block" href="{{ route('arcus-triumphalis') }}"
            style="background: url('{{ asset('img/bgs/arcus_triumphalis.png') }}') center/cover no-repeat; ">
            <h2>Arcus triumphalis</h2>
        </a>
    </div>
</body>
</html>
