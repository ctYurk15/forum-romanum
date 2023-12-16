<header  style="background: url({{ asset('img/bgs/main-bg.jpg') }}) center/cover no-repeat;">
    <h1 class="page-title">
        {{ $title }}<br>
        @if ($button_title != "")
            @if (!empty($button_link) && $button_link != "")
                <a class="create-button" href="{{ $button_link }}">{{ $button_title }}</a>
            @else
                <button class="create-button">{{ $button_title }}</button>
            @endif
        @endif
        
    </h1>
    
    @if (empty($hide_auth_buttons) || (!empty($hide_auth_buttons) && $hide_auth_buttons != true))
        <div class="header-button header-buttons">
            @if (Illuminate\Support\Facades\Auth::check())
                <a href="{{ route('current-user-page') }}">Profile</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endif
        </div>
    @endif
    <div class="main-page-container header-button">
        <a href="{{ route('home') }}">Main page</a>
    </div>
    
</header>