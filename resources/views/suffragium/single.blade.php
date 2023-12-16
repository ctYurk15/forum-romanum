<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Forum Rooms</title>

    <link rel="stylesheet" href="{{ asset('css/libraries/bootstrap-5.3.2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/suffragium-single.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/main.css') }}">
    
    <script src="{{ asset('js/jquery-3.7.1.js') }}" defer></script>

</head>
<body>

    @include('partials.header', ['title' => 'Suffragium '.$poll->poll_name, 'button_title' => 'Back to suffragiums', 'button_link' => route('all-suffragiums')])

    <div style="margin-right: 50px; margin-left: 50px; margin-top: 10px; text-align: center">
        {{$poll->poll_description}}
    </div>

    <div class="voting-container">
        @foreach($optionsWithVoteCounts as $option)
        <div class="voting-item {{ $selected_option_id == $option->id ? 'voted-option' : '' }}">
            <span class="item-name" data-option-id="{{ $option->id }}">
                {{ $option->option_text }}
            </span>

            @if($option->userHasVoted)
                <span class="vote-count" style="margin-right: 10px">Votes: {{ $option->voteCount }}</span>
            @endif

            @if($current_user != null && !$option->userHasVoted)
                <button class="vote-btn" data-option-id="{{ $option->id }}" data-url="{{ route('vote') }}">Vote</button>
            @endif
        </div>
        @endforeach
    </div>


</body>

<style>
   .voted-option {
       background-color: lightgreen !important; /* Change the color for voted options */
   }
</style>



<script src="{{ asset('js/pages/suffragium-single.js') }}" defer></script>

</html>
