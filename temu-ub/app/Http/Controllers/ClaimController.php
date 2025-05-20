<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;
use App\Models\LostItem;
use Illuminate\Support\Facades\Auth;

class ClaimController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'message' => 'nullable|string|max:255',
        ]);

        $item = LostItem::findOrFail($id);

        Claim::create([
            'user_id' => auth()->id(),
            'item_id' => $item->id,
        ]);

        return back()->with('success', 'Claim submitted and is awaiting review.');
    }

    public function myClaims()
    {
        $claims = Claim::with('item') // eager load item info
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('claims.my_claims', compact('claims'));
    }
}
