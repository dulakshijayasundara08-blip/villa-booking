<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\ContactMessage;
use App\Models\Review;
use App\Models\Room;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'rooms'    => Room::count(),
            'pending'  => Booking::where('status', 'pending')->count(),
            'approved' => Booking::where('status', 'approved')->count(),
            'messages' => ContactMessage::where('is_read', false)->count(),
            'reviews'  => Review::count(),
        ];

        $latestBookings = Booking::with('room')->latest()->take(5)->get();
        $latestMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestBookings', 'latestMessages'));
    }
}