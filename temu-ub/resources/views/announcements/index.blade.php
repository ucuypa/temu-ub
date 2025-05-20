<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: white;
        }

        .container {
            width: 80%;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
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
            margin-left: 50px;
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

        .modal {
            background-color: rgba(0, 0, 0, 0.5);
            position: fixed;
            z-index: 1050;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-dialog {
            margin: 10% auto;
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

        a {
            text-decoration: none;
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
            <a class="announcement-nav" href="/announcements">Announcement</a>
        </div>
        <div class="menu">
            <div class="dropdown">
                <a class="profile" href="#">{{ Auth::user()->name }}</a>
                <div class="dropdown-content">
                    <a href="{{ route('profile.edit') }}">My Profile</a>
                    <a href="#" onclick="event.preventDefault(); openAnnouncementModal();">New Announcement</a>
                    <a href="{{ route('announcements.my') }}">My Announcement</a>
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <div class="header">
        <h1>Announcement</h1>
    </div>

    <!-- Modal for create new announcement -->
    <div class="modal" id="announcementModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Create Announcement</h3>
                    <button type="button" class="close" onclick="closeAnnouncementModal()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('announcements.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" required>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control" rows="4" id="content" required></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @forelse($announcement as $item)
    <a href="{{ route('announcements.show', $item->id) }}">
        <div class="container">
            <h2>{{ $item->title }}</h2>
            <p>{{ \Illuminate\Support\Str::limit($item->content, 100) }}</p>
            <p><strong>Posted by:</strong> {{ $item->user->name }}</p>
        </div>
    </a>
    @empty
    <center><p>No announcements found.</p></center>
    @endforelse

</body>
<script>
    function openAnnouncementModal() {
        document.getElementById('announcementModal').style.display = 'block';
    }

    function closeAnnouncementModal() {
        document.getElementById('announcementModal').style.display = 'none';
    }

    // Optional: Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('announcementModal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
</script>

</html>