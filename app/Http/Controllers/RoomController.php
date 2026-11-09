<?php

namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::orderBy('price_per_night')->get();

        return view('rooms.index', compact('rooms'));
    }

    public function show(Room $room)
    {
        $reviews = $room->reviews()
            ->where('is_approved', true)
            ->latest()
            ->get();

        $averageRating = $reviews->avg('rating');

        return view('rooms.show', compact('room', 'reviews', 'averageRating'));
    }
}