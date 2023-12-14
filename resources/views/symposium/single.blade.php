<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forum Rooms</title>

    <link rel="stylesheet" href="{{ asset('css/libraries/bootstrap-5.3.2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/symposium-single.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/main.css') }}">
    
    <script src="{{ asset('js/jquery-3.7.1.js') }}" defer></script>
</head>
<body>

    @include('partials.header', ['title' => 'Symposium '.$name.' messages', 'button_title' => 'Back to symposiums', 'button_link' => route('all-symposiums')])

    @include('partials.pagination', ['title' => 'Forum symposiums', 'hide_searсh' => true])


    @if($messages->lastPage() > 1)
        <div class="pagination">
            @if($messages->currentPage() > 1)
                <a href="{{ $messages->previousPageUrl() }}">Previous</a>
            @endif

            @for($i = 1; $i <= $messages->lastPage(); $i++)
                <a href="{{ $messages->url($i) }}" class="{{ $messages->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
            @endfor

            @if($messages->currentPage() < $messages->lastPage())
                <a href="{{ $messages->nextPageUrl() }}">Next</a>
            @endif
        </div>
    @else
        <div class="pagination">&nbsp;</div>
    @endif

    <main>

        @foreach ($messages as $message)
            <div class="message-container">
                <div class="user-info">
                    @if ($message->user->photo_path == "")
                        <img src="{{ asset('img/profile-pictures/no_profile.png') }}" alt="User Avatar" class="user-avatar">
                    @else
                        <img src="{{ asset('img/profile-pictures/'.$message->user->photo_path) }}" alt="User Avatar" class="user-avatar">
                    @endif
                    <div>
                        {{-- Display the actual user name and rating --}}
                        <h3>{{ $message->user->name }}</h3>
                        <span class="user-rating">Rating: {{ $message->user->rating }}</span>
                    </div>
                </div>
                <div class="message-details">
                    <p>Posted on: {{ $message->created_at->format('F j, Y \a\t H:i:s') }}</p>
                </div>
                <div class="message-content">
                    <p>{{ $message->message_text }}</p>
                </div>
            </div>
        @endforeach

        
        <form class="new-message-form"  action="{{ route('messages-save') }}" method="post">
            @csrf
            <input type='hidden' name='room_id' value='{{ $id }}'>
            <textarea name="message_text" id="new-message" rows="4" placeholder="Type your message here..." required></textarea>
            @if ($current_user != null)
                <button type="submit" class="post-button">Post</button>
            @else
                <h3 style="color:red">Please login or register</h3>
            @endif
        </form>

    </main>


</body>
</html>
