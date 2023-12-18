<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        div {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
        }

        button, .linka {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .tab-container {
            display: none;
        }

        p {
            margin: 0;
        }

        .record-list {
            list-style-type: none;
            padding: 0;
        }

        .record-item {
            border-bottom: 1px solid #ddd;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .delete-button {
            background-color: #f44336;
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<script src="{{ asset('js/jquery-3.7.1.js') }}" defer></script>
<body>

<div>
    <!-- Top buttons -->
    <a href="{{ route('home') }}" class="linka">Main Page</a>
    <a href="{{ route('current-user-page') }}" class="linka">Profile</a>

    <!-- Tabs -->
    <div>
        <button onclick="showTab('rooms')">Rooms</button>
        <button onclick="showTab('polls')">Polls</button>
        <button onclick="showTab('users')">Users</button>
    </div>

    <!-- Container for each tab -->
    <div id="roomsTab" class="tab-container">
        <a class="delete-button" href="{{ route('symposium-new') }}">Add room</a>
        <ul class="record-list">
            @foreach ($rooms as $room)
                <li class="record-item">
                    <a href="{{ route('symposium', ['symposium_id' => $room->id]) }}">{{ $room->title }}</a>
                    <button class="delete-button" onclick="deleteRecord('room', {{ $room->id }})">Delete record</button>
                </li>
            @endforeach
        </ul>
    </div>

    <div id="pollsTab" class="tab-container">
        <a class="delete-button" href="{{ route('suffragium-new') }}">Add poll</a>
        <ul class="record-list">
            @foreach ($polls as $poll)
                <li class="record-item">
                    <a href="{{ route('suffragium', ['suffragium_id' => $poll->id]) }}">{{ $poll->poll_name }}</a>
                    <button class="delete-button" onclick="deleteRecord('poll', {{ $poll->id }})">Delete record</button>
                </li>
            @endforeach
        </ul>
    </div>

    <div id="usersTab" class="tab-container">
        <ul class="record-list">
            @foreach ($users as $user)
            <li class="record-item">
                <a href="{{ route('user-page', ['user_id' => $user->id]) }}">{{ $user->name }}</a>
                <button class="delete-button" onclick="deleteRecord('user', {{ $user->id }})">Delete record</button>
                <button class="make-admin-button" onclick="makeAdmin({{ $user->id }})" style="{{ $user->is_admin ? 'visibility: hidden' : '' }}">Make Admin</button>
            </li>
            @endforeach
            <!-- Add more user records as needed -->
        </ul>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Hide all tabs initially
        document.querySelectorAll('.tab-container').forEach(container => {
            container.style.display = 'none';
        });
    });

    function navigateTo(destination) {
        // Handle navigation logic (e.g., redirect to main page or profile)
        console.log(`Navigating to ${destination}`);
    }

    function showTab(tabName) {
        // Handle tab switching logic (e.g., show/hide content based on selected tab)
        console.log(`Showing tab: ${tabName}`);

        // Example: Hide all tabs
        document.querySelectorAll('.tab-container').forEach(container => {
            container.style.display = 'none';
        });

        // Show the selected tab
        const selectedTab = document.getElementById(`${tabName}Tab`);
        if (selectedTab) {
            selectedTab.style.display = 'block';
        }
    }

    function deleteRecord(recordType, recordId) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Send an AJAX request to delete the record
        $.ajax({
            url: `{{ route('admin.deleteRecord', ['recordType' => '__REPLACE__', 'recordId' => '__REPLACE__']) }}`
                .replace('__REPLACE__', recordType)
                .replace('__REPLACE__', recordId),
            type: 'DELETE',
            success: function(response) {
                // Handle success (e.g., remove the record from the UI)
                console.log('Record deleted successfully');
                window.location.reload();
            },
            error: function(error) {
                console.error('Error deleting record:', error);
            }
        });
    }

    function makeAdmin(userId) {
        // Send an AJAX request to make the user admin
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: `{{ route('admin.makeAdmin', ['userId' => '__REPLACE__']) }}`.replace('__REPLACE__', userId),
            type: 'POST', // You can use POST or PATCH based on your requirements
            success: function(response) {
                // Handle success (e.g., update the UI)
                console.log('User is now an admin');
                window.location.reload();
            },
            error: function(error) {
                console.error('Error making user admin:', error);
            }
        });
    }
</script>

</body>
</html>
