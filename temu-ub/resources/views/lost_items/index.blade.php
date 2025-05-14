<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

        .filter-btn {
        background-color: #ffffff;
        color: rgb(0, 0, 0);
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 5px;
        margin-right: 15px;
        font-size: 14px;
    }

    .filter-btn:hover {
        background-color: #ffffff;
        color: #A3D1C6;
    }

    .filter-btn i {
        font-size: 14px;
    }

    /* modal section */
    .menu {
        display: flex;
        align-items: center;
    }

    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }
    
    .modal-content {
        background: white;
        padding: 30px;
        border-radius: 17px;
        width: 500px;
        max-width: 90%;
    }
    
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }
    
    .modal-header .close {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
    }
    
    .form-group {
        margin-bottom: 15px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
    }
    
    .form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    
    .modal-footer {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }
    
    .btn {
        padding: 8px 15px;
        border-radius: 4px;
        cursor: pointer;
    }
    
    .btn-secondary {
        background: #6c757d;
        color: white;
        border: none;
    }
    
    .btn-primary {
        background: #8abeb3;
        color: white;
        border: none;
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
            <!-- Filter Button -->
        <button class="filter-btn" onclick="document.getElementById('filterModal').style.display='flex'">
            <i class="fas fa-filter"></i>
        </button>

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

<!-- Filter Modal -->
<div class="modal" id="filterModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Filters</h3>
                <button type="button" class="close" onclick="closeModal()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('lost-items.index') }}" method="GET">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Published Date</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" name="date_from" class="form-control" placeholder="From" value="{{ request('date_from') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="date" name="date_to" class="form-control" placeholder="To" value="{{ request('date_to') }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control" placeholder="Filter by location" value="{{ request('location') }}">
                    </div>
                    
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            @foreach($statuses as $key => $value)
                                <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Categories</label>
                        <select name="item_type" class="form-control">
                            @foreach($types as $key => $value)
                                <option value="{{ $key }}" {{ request('item_type') == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add this script -->
<script>
    // Function to open modal
    function openModal() {
        document.getElementById('filterModal').style.display = 'flex';
    }
    
    // Function to close modal
    function closeModal() {
        document.getElementById('filterModal').style.display = 'none';
    }
    
    // Close modal when clicking outside of it
    window.onclick = function(event) {
        const modal = document.getElementById('filterModal');
        if (event.target == modal) {
            closeModal();
        }
    }
    
    // Update your filter button to use openModal()
    document.addEventListener('DOMContentLoaded', function() {
        const filterBtn = document.querySelector('.filter-btn');
        if (filterBtn) {
            filterBtn.onclick = openModal;
        }
    });
</script>
</html>