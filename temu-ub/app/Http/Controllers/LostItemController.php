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
        $query = LostItem::query();

        // Search functionality
        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('item_name', 'like', '%'.$request->search.'%')
                  ->orWhere('description', 'like', '%'.$request->search.'%')
                  ->orWhere('location_found', 'like', '%'.$request->search.'%');
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
            $query->where('location_found', 'like', '%'.$request->location.'%');
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
}
