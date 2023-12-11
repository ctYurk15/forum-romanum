<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forum Rooms</title>

    <link rel="stylesheet" href="{{ asset('css/libraries/bootstrap-5.3.2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/symposiums-all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/main.css') }}">
    
    <script src="{{ asset('js/jquery-3.7.1.js') }}" defer></script>
</head>
<body>

    @include('partials.header', ['title' => 'Forum symposiums', 'button_title' => 'Create new symposium', 'button_link' => route('symposium-new')])

    @include('partials.pagination', ['title' => 'Forum symposiums', 'button_title' => 'Create new symposium'])

    <main>
        @foreach($rooms as $room)
            <a class="forum-room" href="{{ route('symposium', ['symposium_id' => $room->id]) }}">
                <div class="room-content">
                    <h2>{{ $room->title }}</h2>
                    <p>{{ $room->description }}</p>
                </div>
                <div class="room-details">
                    <p>Created: {{ $room->created_at->format('F j, Y') }}</p>
                    <p>Last Message: {{ $room->last_message_at ? $room->last_message_at->format('F j, Y') : 'N/A' }}</p>
                    <p>Total Messages: {{ $room->messages_count ?? 0 }}</p>
                </div>
            </a>
        @endforeach
    </main>

    <!-- Manually build pagination links -->
    @if($rooms->lastPage() > 1)
        <div class="pagination">
            @if($rooms->currentPage() > 1)
                <a href="{{ $rooms->previousPageUrl() }}">Previous</a>
            @endif

            @for($i = 1; $i <= $rooms->lastPage(); $i++)
                <a href="{{ $rooms->url($i) }}" class="{{ $rooms->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
            @endfor

            @if($rooms->currentPage() < $rooms->lastPage())
                <a href="{{ $rooms->nextPageUrl() }}">Next</a>
            @endif
        </div>
    @endif

</body>
</html>
