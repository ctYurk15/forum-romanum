<header>
    <h1 class="page-title">
        {{ $title }}<br>
        @if ($button_title != "")
            <button class="create-button">{{ $button_title }}</button>
        @endif
        
    </h1>
    @isset($var)

    @endisset
    @if (empty($hide_auth_buttons) || (!empty($hide_auth_buttons) && $hide_auth_buttons != true))
        <div class="header-button header-buttons">
            <a href="{{ route('current-user-page') }}">Profile</a>
            <a href="#" class="hidden">Login</a>
        </div>
    @endif
    <div class="main-page-container header-button">
        <a href="{{ route('home') }}">Main page</a>
    </div>
    
</header>