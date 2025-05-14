<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Profile</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: #f9f9f9;
      color: #333;
    }

    .edit-profile-container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
    }

    .header-section {
      background-color: #1d1f27;
      color: #fff;
      text-align: center;
      padding: 30px 20px 100px;
      position: relative;
    }

    .profile-photo {
      position: absolute;
      top: 60px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .profile-photo img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid #fff;
    }

    .upload-photo-wrapper {
      margin-top: 10px;
      position: relative;
      overflow: hidden;
    }

    .upload-photo-wrapper label {
      display: inline-block;
      background-color: #fff;
      color: #1d1f27;
      padding: 6px 12px;
      font-size: 0.85rem;
      font-weight: 600;
      border-radius: 6px;
      cursor: pointer;
      border: 1.5px solid #ccc;
    }

    .upload-photo-wrapper input[type="file"] {
      font-size: 0;
      position: absolute;
      left: 0;
      top: 0;
      opacity: 0;
      cursor: pointer;
      width: 100%;
      height: 100%;
    }

    .form-section {
      margin-top: 80px;
      padding: 30px 40px;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .form-section label {
      font-weight: 500;
    }

    .form-section input[type="text"],
    .form-section input[type="email"],
    .form-section input[type="password"],
    .form-section input[type="tel"] {
      padding: 10px 12px;
      border: 1.5px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
    }

    .button-group {
      display: flex;
      justify-content: space-between;
      margin-top: 25px;
    }

    .save-btn,
    .delete-btn {
      flex: 1;
      padding: 12px 20px;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .save-btn {
      background-color: #1d1f27;
      color: white;
      margin-right: 10px;
    }

    .save-btn:hover {
      background-color: #333645;
    }

    .delete-btn {
      background-color: #ff7070;
      color: white;
    }

    .delete-btn:hover {
      background-color: #ff4d4d;
    }
  </style>
</head>
<body>
  <div class="edit-profile-container">
    <div class="header-section">
      <h2>Edit Profile</h2>
      <div class="profile-photo">
        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) . '?' . time() }}" alt="Profile Photo" />
        <div class="upload-photo-wrapper">
          <label for="photo">Change Profile Photo</label>
          <input type="file" id="photo" name="photo" accept="image/*" />
        </div>
      </div>
    </div>

    <form class="form-section" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <label for="fullName">Full Name</label>
      <input type="text" id="fullName" name="name" value="{{ old('name', Auth::user()->name) }}" required />

      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required />

      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone" 
       value="{{ old('phone', Auth::user()->phone) }}" 
       required 
       pattern="^\+?[0-9]{9,15}$" 
       inputmode="numeric" 
       maxlength="18" 
       title="Phone number must contain digits only" />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" />

      <label for="bio">Bio</label>
      <input type="text" id="bio" name="bio" value="{{ old('bio', Auth::user()->bio) }}" required />

      <div class="button-group">
        <button type="submit" class="save-btn">Save changes</button>
        <button type="button" class="delete-btn" onclick="confirmDelete()">Delete account</button>
      </div>
    </form>

    <form id="delete-form" action="{{ route('profile.destroy') }}" method="POST" style="display:none;">
      @csrf
      @method('DELETE')
    </form>
  </div>

  <script>
    function confirmDelete() {
      if (confirm('Are you sure you want to delete your account?')) {
        document.getElementById('delete-form').submit();
        alert('Account successfully deleted. Redirecting to register...');
        setTimeout(function () {
          window.location.href = "{{ route('register') }}";
        }, 1000);
      }
    }
  </script>
</body>
</html>
