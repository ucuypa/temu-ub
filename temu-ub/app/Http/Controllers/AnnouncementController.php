<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->get();
        return view('announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('announcements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $announcement = new Announcement;
        $announcement->title = $request->title;
        $announcement->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $announcement->image = basename($imagePath);
        }

        $announcement->save();

        return redirect()->route('announcements.index');
    }
}
