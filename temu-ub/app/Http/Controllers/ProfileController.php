<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();

    // Validasi tambahan (jika tidak ditangani di FormRequest)
    $validated = $request->validated();

    // Update manual untuk field tambahan
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->phone = $request->input('phone');
    $user->bio = $request->input('bio');

    // Upload photo profile jika ada
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo')->store('profile-photos', 'public');
        $user->profile_photo_path = $photo;
    }

    // Update password jika diisi
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    // Reset email verification jika email berubah
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();

    return Redirect::route('profile.edit')->with('status', 'profile-updated');
}

    /**
     * Delete the user's account.
     */
    public function destroy()
{
    $user = Auth::user();
    Auth::logout();
    $user->delete();

    return redirect('/register')->with('status', 'Akun berhasil dihapus. Silakan daftar kembali jika ingin menggunakan layanan kami.');
}
}
