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

    <form class="search-bar" action="{{ route('all-suffragiums') }}" method="get">
        <input type="text" class="search-input" placeholder="Search..." value="{{ request('name') }}" name='name'>
        <button class="search-button">Search</button>
    </form>

    @if($polls->lastPage() > 1)
        <div class="pagination">
            @if($polls->currentPage() > 1)
                <a href="{{ $polls->previousPageUrl() }}">Previous</a>
            @endif

            @for($i = 1; $i <= $polls->lastPage(); $i++)
                <a href="{{ $polls->url($i) }}" class="{{ $polls->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
            @endfor

            @if($polls->currentPage() < $polls->lastPage())
                <a href="{{ $polls->nextPageUrl() }}">Next</a>
            @endif
        </div>
    @else
        <div class="pagination">&nbsp;</div>
    @endif

    <main>

        @foreach($polls as $poll)
            <a class="forum-suffragium" href="{{ route('suffragium', ['suffragium_id' => $poll->id]) }}">
                <div class="suffragium-content">
                    <h2>{{ $poll->poll_name }}</h2>
                    <p>{{ $poll->poll_description }}</p>
                </div>
                <div class="suffragium-details">
                    <p>Created: {{ $poll->created_at->format('F d, Y \a\t H:i:s') }}</p><br>
                    <p>Status: {{ $poll->poll_status }}</p>
                </div>
            </a>
        @endforeach

    </main>

</body>
</html>
