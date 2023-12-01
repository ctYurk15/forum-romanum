<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forum Rooms</title>

    <link rel="stylesheet" href="{{ asset('css/libraries/bootstrap-5.3.2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/suffragiums-all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/main.css') }}">
    
    <script src="{{ asset('js/jquery-3.7.1.js') }}" defer></script>
</head>
<body>

    @include('partials.header', ['title' => 'Forum suffragiums', 'button_title' => 'Create new suffragium', 'button_link' => route('suffragium-new')])

    @include('partials.pagination')

    <main>
        <a class="forum-suffragium" href="{{ route('suffragium', ['suffragium_id' => 1]) }}">
            <div class="suffragium-content">
                <h2>Suffragium 1</h2>
                <p>Description for Suffragium 1.</p>
            </div>
            <div class="suffragium-details">
                <p>Status: voting</p>
            </div>
        </a>

        <a class="forum-suffragium" href="{{ route('suffragium', ['suffragium_id' => 2]) }}">
            <div class="suffragium-content">
                <h2>Suffragium 2</h2>
                <p>Description for Suffragium 2.</p>
            </div>
            <div class="suffragium-details">
                <p>Status: completed</p>
            </div>
        </a>
    </main>

</body>
</html>
