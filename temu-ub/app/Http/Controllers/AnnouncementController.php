<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcement = Announcement::with('user')->latest()->get();
        return view('announcements.index', compact('announcement'));
    }

    public function create()
    {
        return view('announcements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Announcement::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('announcements.index')->with('success', 'Announcement created!');
    }

    public function show($id)
    {
        // Find the announcement by ID or fail if not found
        $announcement = Announcement::findOrFail($id);

        // Pass the announcement data to the view
        return view('announcements.show', compact('announcement'));
    }

    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);

        if ($announcement->user_id !== auth()->id()) {
            abort(403);
        }

        return view('announcements.edit', compact('announcement'));
    }

    public function update(Request $request, $id)
    {
        $announcement = Announcement::findOrFail($id);

        if ($announcement->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $announcement->update($request->only('title', 'content'));

        return redirect()->route('announcements.index')->with('success', 'Announcement updated!');
    }


    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->route('announcements.index')->with('success', 'Announcement deleted.');
    }

    // Show only announcements created by the logged-in user
    public function myAnnouncements()
    {
        // Assuming announcements are linked to users via user_id
        $announcements = Announcement::where('user_id', auth()->id())->get();

        return view('announcements.my', [
            'announcements' => $announcements
        ]);
    }
}
