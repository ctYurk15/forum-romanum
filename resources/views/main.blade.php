<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 5px; /* Add gap between blocks */
            background-color: #f6f6f6; /* Light background color */
            font-family: 'Times New Roman', serif; /* Roman-inspired font */
        }

        #first-block {
            position: relative;
            height: 40vh;
            width: 100%;
            background: url('https://picsum.photos/1920/400') center/cover no-repeat; /* Replace 'your-roman-background-image.jpg' with your actual image path */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff; /* White text color on the background */
        }

        .user-box {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #fff;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #user-box-content {
            margin-right: 10px;
        }

        #second-block, #third-block, #fourth-block {
            box-sizing: border-box;
            transition: box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #fff; /* White background color for content blocks */
            border: 1px solid #ccc; /* Border around content blocks */
        }

        .link-block-container
        {
            height: calc(60vh - 10px);
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 5px;
        }

        /* Optional: Add styles for the content within each block */
        #second-block, #third-block, #fourth-block {
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #000; /* Text color on the content blocks */
        }

        #second-block:hover, #third-block:hover, #fourth-block:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        #second-block {
            background: url('https://picsum.photos/750/450?random=1') center/cover no-repeat; 
        }

        #third-block {
            background: url('https://picsum.photos/750/450?random=2') center/cover no-repeat; 
        }

        #fourth-block {
            background: url('https://picsum.photos/750/450?random=3') center/cover no-repeat; 
        }

        .hidden
        {
            display: none;
        }
    </style>
    <title>Roman Republic Forum</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.2.css') }}">
    <script src="{{ asset('js/jquery-3.7.1.js') }}" defer></script>
</head>
<body>
    <div id="first-block">
        <!-- Content for the first block -->
        <h1>Welcome to Forum of {{ $city_name }}</h1>
        <div class="user-box" id="user-box-content">
            <!-- Box showing user name and link to profile -->
            <a href="profile.html" style="color: #000;">Username</a>
        </div>
        <div class="user-box hidden">
            <!-- Box showing link to login page -->
            <a href="login.html" style="color: #000;">Login</a>
        </div>
    </div>
    <div class="link-block-container">
        <a id="second-block"  href="{{ route('all-symposiums') }}">
            <h2>Symposiums</h2>
        </a>
        <a id="third-block" href="{{ route('all-suffragiums') }}">
            <h2>Suffragiums</h2>
        </a>
        <a id="fourth-block" href="{{ route('top-rating') }}">
            <h2>Arcus triumphalis</h2>
        </a>
    </div>
</body>
</html>
