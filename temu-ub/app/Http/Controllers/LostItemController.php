<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LostItem;
use App\Models\Claim;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'item_color' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'location_found' => 'required|string|max:255',
            'date_found' => 'required|date',
            'image' => 'nullable|image|max:2048', // optional validation for image
        ]);

        $lostItem = new LostItem();
        $lostItem->user_id = Auth::id();
        $lostItem->item_type = $request->item_type;
        $lostItem->item_name = $request->item_name;
        $lostItem->item_color = $request->item_color;
        $lostItem->description = $request->description;
        $lostItem->location_found = $request->location_found;
        $lostItem->date_found = $request->date_found;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('lost-items', 'public');
            $lostItem->image_path = $path;
        }

        $lostItem->save();

        return redirect()->route('lost-items.index')->with('success', 'Lost item created successfully!');
    }


    public function show($id)
    {
        // Find the lost item by ID
        $item = LostItem::findOrFail($id);  // Using findOrFail to handle errors if the item doesn't exist

        $claim = Claim::where('item_id', $id)
            ->where('user_id', Auth::id())
            ->first();

        // Return the view and pass the item data
        return view('lost_items.show', compact('item', 'claim'));
    }



    public function index(Request $request)
    {
        $query = LostItem::query();

        // Search functionality
        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('item_name', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%')
                    ->orWhere('location_found', 'like', '%' . $request->search . '%');
            });
        }

        // Apply filters
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('item_type') && $request->item_type != 'all') {
            $query->where('item_type', $request->item_type);
        }

        if ($request->filled('date_from')) {
            $query->where('date_found', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->where('date_found', '<=', $request->date_to);
        }

        if ($request->filled('location') && $request->location != '') {
            $query->where('location_found', 'like', '%' . $request->location . '%');
        }

        $lostItems = $query->latest()->get();
        $statuses = [
            'all' => 'All Statuses',
            'unclaimed' => 'Not Retrieved',
            'claimed' => 'Retrieved'
        ];

        $types = [
            'all' => 'All Categories',
            'Laptop' => 'Laptop',
            'Phone' => 'Phone',
            'Accessories' => 'Accessories',
            'Shoes' => 'Shoes',
            'Utilities' => 'Utilities',
            'Other' => 'Other'
        ];

        return view('lost_items.index', compact('lostItems', 'statuses', 'types'));
    }

    public function myItemReport()
    {
        $lostItems = LostItem::where('user_id', auth()->id())->get(); // or any ownership logic

        return view('lost_items.my', compact('lostItems'));
    }

    /**
     * Show the form for editing a specific lost item.
     */
    public function edit($id)
    {
        $item = LostItem::findOrFail($id);

        if ($item->user_id !== Auth::id()) {
            abort(403);
        }

        return view('lost_items.edit', compact('item'));
    }

    /**
     * Update the specified lost item in storage.
     */
    public function update(Request $request, $id)
    {
        $item = LostItem::findOrFail($id);

        // Check ownership
        if ($item->user_id !== Auth::id()) {
            abort(403);
        }

        // Validate fields according to your form inputs
        $request->validate([
            'item_type' => 'required|string|max:255',
            'item_name' => 'required|string|max:255',
            'item_color' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'location_found' => 'required|string|max:255',
            'date_found' => 'required|date',
            'image' => 'nullable|image|max:2048', // optional image validation (max 2MB)
        ]);

        // Handle image upload if there's a new file
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($item->image_path && Storage::exists($item->image_path)) {
                Storage::delete($item->image_path);
            }
            $path = $request->file('image')->store('lost-items', 'public');
            $item->image_path = $path;
        }

        // Update other fields
        $item->item_type = $request->item_type;
        $item->item_name = $request->item_name;
        $item->item_color = $request->item_color;
        $item->description = $request->description;
        $item->location_found = $request->location_found;
        $item->date_found = $request->date_found;

        $item->save();

        return redirect()->route('lost_items.my')->with('success', 'Lost item updated successfully!');
    }


    /**
     * Remove the specified lost item from storage.
     */
    public function destroy($id)
    {
        $item = LostItem::findOrFail($id);

        if ($item->user_id !== Auth::id()) {
            abort(403);
        }

        $item->delete();

        return redirect()->route('lost-items.my')->with('success', 'Lost item deleted successfully!');
    }
}
