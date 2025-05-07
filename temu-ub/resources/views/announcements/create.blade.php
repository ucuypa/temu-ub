<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Announcement</title>
</head>
<body>

    <h1>Create New Announcement</h1>

    <form action="{{ route('announcements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
        </div>
        <div>
            <button type="submit">Create Announcement</button>
        </div>
    </form>

    <a href="{{ route('announcements.index') }}">Back to Announcements</a>

</body>
</html>
