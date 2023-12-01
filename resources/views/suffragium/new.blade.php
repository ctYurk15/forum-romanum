<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forum Rooms</title>

    <link rel="stylesheet" href="{{ asset('css/libraries/bootstrap-5.3.2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/suffragium-new.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/main.css') }}">
    
    <script src="{{ asset('js/jquery-3.7.1.js') }}" defer></script>

</head>
<body>

    @include('partials.header', ['title' => 'Create new suffragium ', 'button_title' => 'Back to suffragiums', 'button_link' => route('all-suffragiums')])

    <div class="new-voting-container">
        <h2>Create a New Voting</h2>
        <form action="#" method="post">
            <label for="votingName">Voting Name:</label>
            <input type="text" id="votingName" name="votingName" required>
            <br>
            <label for="votingDescription">Voting Description:</label>
            <textarea id="votingDescription" name="votingDescription" rows="4" required></textarea>
            <br>
            <div class="options-container">
                <label>Options:</label>
                <div class="option">
                    <input type="text" name="option[]" required>
                    <button type="button" onclick="removeOption(this)">Delete</button>
                </div>
            </div>
            <br>
            <button type="button" onclick="addOption()">Add Option</button>
            <br>
            <br>
            <button type="submit">Create Voting</button>
        </form>
    </div>
</body>


    
<script src="{{ asset('js/pages/suffragium-new.js') }}" defer></script>

</html>
