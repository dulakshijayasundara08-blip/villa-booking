<?php

namespace App\Http\Controllers;

class MyBookingController extends Controller
{
    public function index()
    {
        $bookings = auth()->user()
            ->bookings()
            ->with('room')
            ->latest()
            ->get();

        $stats = [
            'total'    => $bookings->count(),
            'pending'  => $bookings->where('status', 'pending')->count(),
            'approved' => $bookings->where('status', 'approved')->count(),
        ];

        return view('account.dashboard', compact('bookings', 'stats'));
    }
}