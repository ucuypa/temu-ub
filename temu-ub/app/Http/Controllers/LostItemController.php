<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LostItem;
use Illuminate\Support\Facades\Auth;

class LostItemController extends Controller
{
    public function create()
    {
        return view('lost_items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location_found' => 'required|string|max:255',
            'date_found' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('lost_items', 'public');
        }

        LostItem::create([
            'user_id' => Auth::id(),
            'item_name' => $request->item_name,
            'description' => $request->description,
            'location_found' => $request->location_found,
            'date_found' => $request->date_found,
            'image_path' => $path,
            'status' => 'unclaimed',
        ]);

        return redirect()->back()->with('success', 'Lost item reported successfully!');
    }

    public function index(Request $request)
    {
        $query = LostItem::query();

        if ($search = $request->input('search')) {
            $query->where('item_name', 'like', "%$search%");
        }

        $lostItems = $query->latest()->get();

        return view('lost_items.index', compact('lostItems'));
    }
}
