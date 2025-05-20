<!-- resources/views/announcements/show.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $announcement->title }} - Announcement Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            width: 80%;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .col-md-6 {
            width: 48%;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        h3 {
            font-size: 24px;
            color: #333;
        }

        p {
            font-size: 16px;
            color: #555;
        }

        .btn-primary {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .status {
            font-weight: bold;
        }

        .text-success {
            color: green;
        }

        .text-danger {
            color: red;
        }

        nav {
            background-color: rgb(255, 255, 255);
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
            font-size: 16px;
        }

        .dropdown {
            position: relative;
            margin-right: 80px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .logo {
            display: flex;
            width: 95px;
            height: 56px;
            flex-direction: column;
            justify-content: center;
            color: black;
            font-family: Epilogue;
            font-size: 32px;
            font-weight: 600;
            margin-left: 20px;
        }

        .temu {
            display: flex;
            width: 95px;
            margin-top: 5px;
            flex-direction: column;
            justify-content: center;
            color: black;
            font-family: Epilogue;
            font-size: 32px;
            font-weight: 600;
        }

        .ub {
            display: flex;
            width: 95px;
            margin-top: -28px;
            flex-direction: column;
            justify-content: center;
            color: #A3D1C6;
            font-family: Epilogue;
            font-size: 32px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }

        .page-select {
            margin-top: 1px;
            margin-left: -1057px;
        }

        .founditems {
            color: black;
            width: 120px;
            font-weight: 600;
        }

        .announcement {
            color: black;
            width: 120px;
            font-weight: 600;
        }

        .page-select a:hover {
            color: #A3D1C6;
        }

        .profile {
            color: black;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav>
        <div class="logo">
            <a class="temu">Temu</a>
            <a class="ub">UB</a>
        </div>
        <div class="page-select">
            <a class="founditems" href="/lost-items">Found Items</a>
            <a class="announcement" href="/announcements">Announcement</a>
        </div>
        <div class="menu">
            <div class="dropdown">
                <a class="profile" href="#">{{ Auth::user()->name }}</a>
                <div class="dropdown-content">
                    <a href="{{ route('profile.edit') }}">My Profile</a>
                    <a href="{{ route('announcements.create') }}">New Announcement</a>
                    <a href="{{ route('announcements.my') }}">My Announcement</a>
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Announcement Content -->
    <div class="container">
        <h3>{{ $announcement->title }}</h3>
        <p>{{ $announcement->content }}</p>
        <p><strong>Posted by:</strong> {{ $announcement->user->name }}</p>
    </div>
</body>

</html>