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
            'item_type' => 'required|string|max:255',
            'item_name' => 'required|string|max:255',
            'item_color' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'location_found' => 'required|string|max:255',
            'date_found' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('lost-items', 'public');
        }

        LostItem::create([
            'user_id' => Auth::id(),
            'item_type' => $request->item_type ?? 'Unknown',
            'item_name' => $request->item_name,
            'item_color' => $request->item_color,
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
        $search = $request->input('search');

        $lostItems = LostItem::when($search, function ($query, $search) {
            return $query->where('item_name', 'like', "%{$search}%")
                       ->orWhere('description', 'like', "%{$search}%")
                       ->orWhere('location_found', 'like', "%{$search}%");
        })->latest()->get();

        return view('lost_items.index', compact('lostItems'));
    }
}
