<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Announcements</title>
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

        .header h2:hover {
            color: #A3D1C6;
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

        .max-height-card-body {
            max-height: 100px;
            /* Maximum height for card body */
            overflow-y: auto;
            /* Makes content scrollable if it exceeds max height */
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
            margin-left: -1050px;
        }

        .founditems {
            color: black;
            width: 120px;
            font-weight: 600;
        }

        .announcement-nav {
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
            background-color: rgba(0, 0, 0, 0.5);
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

        a {
            text-decoration: none;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin: 30px 40px 20px;
        }

        .announcement {
            background: #d3d3d3;
            margin: 0 40px 20px;
            padding: 20px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .announcement img {
            width: 100px;
            height: auto;
            border-radius: 5px;
        }

        .announcement .info {
            flex: 1;
        }

        .announcement .info h3 {
            margin: 0;
            font-weight: bold;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .buttons button {
            padding: 10px 20px;
            border: none;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        .buttons .edit {
            background-color: #1c1c25;
        }

        .buttons .delete {
            background-color: #b11111;
        }
    </style>
</head>

<body>
    <nav>
        <div class="logo">
            <a class="temu">Temu</a>
            <a class="ub">UB</a>
        </div>
        <div class="page-select">
            <a class="founditems" href="/lost-items">Found Items</a>
            <a class="announcement-nav" href="/announcements">Announcement</a>
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

    <div class="title">My Announcement</div>

    @foreach ($announcements as $announcement)
    <div class="announcement">
        <div class="info mb-3 p-3 border rounded">
            <h3>{{ $announcement->title }}</h3>
            <p>{{ Str::limit($announcement->content, 150) }}</p> <!-- optional character limit -->
        </div>
        <div class="buttons">
            <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn btn-primary">Edit</a>


            <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete" onclick="return confirm('Are you sure you want to delete this announcement?')">Delete</button>
            </form>
        </div>
    </div>
    @endforeach

</body>
<script>
    function openEditModal(id, title, content) {
        document.getElementById('editModal').style.display = 'block';
        document.getElementById('editTitle').value = title;
        document.getElementById('editContent').value = content;
        document.getElementById('editForm').action = `/announcements/${id}`;
    }

    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    // Optional: Close modal on outside click
    window.onclick = function(event) {
        const modal = document.getElementById('editModal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</html>