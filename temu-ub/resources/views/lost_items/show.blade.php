<!-- resources/views/lost-items/show.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $item->item_name }} - Lost Item Details</title>
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
            margin-left: -387px;
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

        .search-form {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .search-input {
            padding: 10px;
            border: none;
            outline: none;
            font-size: 14px;
            width: 200px;
        }

        .search-button {
            background-color: #ffffff;
            border: none;
            color: rgb(0, 0, 0);
            padding: 10px 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
        }

        .search-button:hover {
            background-color: #ffffff;
            color: #A3D1C6;
        }

        .search-button i {
            font-size: 14px;
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
            <form action="{{ route('lost-items.index') }}" method="GET" class="search-form">
                <input type="text" name="search" placeholder="Search" class="search-input">
                <button type="submit" class="search-button">
                    <i class="fas fa-search"></i>
                </button>
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
        <div class="row">
            <!-- Item Image -->
            <div class="col-md-6">
                @if($item->image_path)
                <img src="{{ asset('storage/' . $item->image_path) }}" class="img-fluid" alt="Item image">
                @else
                <img src="{{ asset('storage/lost-items/default-laptop.jpeg') }}" class="img-fluid" alt="Default image">
                @endif
            </div>
            <!-- Item Details -->
            <div class="col-md-6">
                <h3>{{ $item->item_name }}</h3>
                <p><strong>Description:</strong> {{ $item->description }}</p>
                <p><strong>Found at:</strong> {{ $item->location_found }}</p>
                <p><strong>Date Found:</strong> {{ $item->date_found }}</p>
                <p><strong>Status:</strong>
                    <span class="status {{ $item->status === 'claimed' ? 'text-success' : 'text-danger' }}">
                        {{ $item->status === 'claimed' ? 'Retrieved' : 'Not Retrieved' }}
                    </span>
                </p>

                @auth
                <form action="{{ route('claims.store', $item->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Claim this item</button>
                </form>
                @endauth

            </div>
        </div>
    </div>
    @if($claim)
    <!-- Modal for Pending Claim -->
    <div class="modal fade" id="claimPendingModal" tabindex="-1" aria-labelledby="claimPendingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="claimPendingModalLabel">Claim Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You’ve already submitted a claim for this item. Please wait while it is being reviewed by the admin.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS & CSS (only include if not already loaded) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = new bootstrap.Modal(document.getElementById('claimPendingModal'));
            modal.show();
        });
    </script>
    @endif
</body>

</html>