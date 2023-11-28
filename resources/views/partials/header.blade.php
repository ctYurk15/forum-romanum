<header>
    <h1 class="page-title">
        {{ $title }}<br>
        @if ($button_title != "")
            <button class="create-button">{{ $button_title }}</button>
        @endif
        
    </h1>
    <div class="header-button header-buttons">
        <a href="#">Profile</a>
        <a href="#" class="hidden">Login</a>
    </div>
    <div class="main-page-container header-button">
        <a href="{{ route('home') }}">Main page</a>
    </div>
</header>