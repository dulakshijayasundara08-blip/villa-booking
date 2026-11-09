<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('room')->latest()->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    public function approve(Booking $booking)
    {
        $isTaken = Booking::where('room_id', $booking->room_id)
            ->where('id', '!=', $booking->id)
            ->where('status', 'approved')
            ->where('check_in', '<', $booking->check_out)
            ->where('check_out', '>', $booking->check_in)
            ->exists();

        if ($isTaken) {
            return back()->with('error', 'Cannot approve: another approved booking already uses this room on these dates.');
        }

        $booking->update(['status' => 'approved']);

        return back()->with('success', 'Booking approved.');
    }

    public function reject(Booking $booking)
    {
        $booking->update(['status' => 'rejected']);

        return back()->with('success', 'Booking rejected.');
    }
}