<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Room;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Room $room)
    {
        $validated = $request->validate([
            'guest_name' => ['required', 'string', 'max:100'],
            'rating'     => ['required', 'integer', 'min:1', 'max:5'],
            'comment'    => ['required', 'string', 'max:1000'],
        ]);

        Review::create([
            'room_id'     => $room->id,
            'guest_name'  => $validated['guest_name'],
            'rating'      => $validated['rating'],
            'comment'     => $validated['comment'],
            'is_approved' => true,
        ]);

        return redirect()
            ->route('rooms.show', $room)
            ->with('success', 'Thank you! Your review has been added.');
    }
}