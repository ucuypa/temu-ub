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

        .header {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .header h2 {
            font-size: 14px;
            color: #4B5563;
        }

        .header h2:hover {
            color: #A3D1C6;
        }

        form input,
        form select,
        form textarea {
            border: 1px solid #ccc;
            padding: 10px;
            width: 100%;
            border-radius: 4px;
            margin-top: 5px;
        }

        form label {
            font-weight: bold;
        }

        form button {
            background-color: #3490DC;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #2779BD;
        }

        .mb-4 {
            margin-bottom: 16px;
        }

        .mb-6 {
            margin-bottom: 24px;
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
            margin-left: -1050px;
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

    <!-- Form Section -->
    <div class="container">
        <form action="{{ route('lost-items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="item_type">Item Type</label>
                <select name="item_type" id="item_type" required>
                    <option value="">-- Select Item Type --</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Phone">Phone</option>
                    <option value="Accessories">Accessories</option>
                    <option value="Shoes">Shoes</option>
                    <option value="Utilities">Utilities</option>
                    <option value="Others">Others</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="item_name">Item Name</label>
                <input type="text" name="item_name" id="item_name" required>
            </div>

            <div class="mb-4">
                <label for="item_color">Item Color</label>
                <input type="text" name="item_color" id="item_color">
            </div>

            <div class="mb-4">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="3"></textarea>
            </div>

            <div class="mb-4">
                <label for="location_found">Location Found</label>
                <input type="text" name="location_found" id="location_found" required>
            </div>

            <div class="mb-4">
                <label for="date_found">Date Found</label>
                <input type="date" name="date_found" id="date_found" required>
            </div>

            <div class="mb-6">
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image">
            </div>

            <button type="submit">Submit</button>
            <a href="{{ route('lost-items.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>