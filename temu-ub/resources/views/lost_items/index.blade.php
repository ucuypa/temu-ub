<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Found Items</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: white;
        }

        .container {
            width: 80%;
            margin-left: 50px;
            padding-top: 20px;
        }

        /* Navbar Styles */
        nav {
            background-color: rgb(255, 255, 255);
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        /* Content Styles */
        .header {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .header h2 {
            font-size: 14px;
            color: #4B5563;
        }

        .header h2:hover{
            color: #A3D1C6;
        }

        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            margin-left: -250px;
        }

        .search-container h2 {
            color: #3490DC;
        }

        .search-container form input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .search-container form button {
            padding: 10px;
            background-color: #6C757D;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .col-md-4,
        .col-lg-3 {
            width: 23%;
            box-sizing: border-box;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-top: 20px;
        }

        .card-img-top {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 18px;
            color: #333;
        }

        .card-text {
            font-size: 14px;
            color: #6C757D;
        }

        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
        }

        .text-success {
            color: #28a745;
        }

        .text-danger {
            color: #dc3545;
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
            margin-top: 30px;
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
            margin-top: 20px;
            margin-left: -550px;
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
            <a class="announcement" href="/announcement">Announcement</a>
        </div>
        <!-- Search Section -->
        <div class="search-container">
            <form action="{{ route('lost-items.index') }}" method="GET">
                <input type="text" name="search" placeholder="Search">
                <button type="submit">🔍</button>
            </form>
        </div>
        <div class="menu">
            <div class="dropdown">
                <a class="profile" href="#">{{ Auth::user()->name }}</a>
                <div class="dropdown-content">
                    <a href="route('profile.edit')">My Profile</a>
                    <a href="{{ route('lost-items.create') }}">New Post</a>
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <h2>All</h2>
            <h2>Laptop</h2>
            <h2>Phones</h2>
            <h2>Accessories</h2>
            <h2>Shoes</h2>
            <h2>Utilities</h2>
        </div>

        <!-- Lost Items Section -->
        <div class="row">
            @forelse($lostItems as $item)
            <div class="col-md-4 col-lg-3">
                <div class="card">
                    <!-- Image with fallback -->
                    @if($item->image_path)
                    <img src="{{ asset('storage/lost-items/' . $item->image_path) }}" class="card-img-top" alt="Item image">
                    @else
                    <img src="{{ asset('storage/lost-items/default-laptop.jpeg') }}" class="card-img-top" alt="Default image">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $item->item_name }}</h5>
                        <p class="card-text">
                            <small>
                                Found at: {{ $item->location_found }}<br>
                                <span class="{{ $item->status === 'claimed' ? 'text-success' : 'text-danger' }} ">
                                    {{ $item->status === 'claimed' ? 'Retrieved' : 'Not Retrieved' }}
                                </span>
                            </small>
                        </p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert-info">No lost items found in the database.</div>
            </div>
            @endforelse
        </div>
    </div>
</body>

</html>