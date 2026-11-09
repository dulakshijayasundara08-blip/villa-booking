<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    public function store(Request $request, Room $room)
    {
        $validated = $request->validate([
            'guest_name' => ['required', 'string', 'max:100'],
            'email'      => ['required', 'email', 'max:150'],
            'phone'      => ['required', 'string', 'max:20'],
            'check_in'   => ['required', 'date', 'after_or_equal:today'],
            'check_out'  => ['required', 'date', 'after:check_in'],
            'guests'     => ['required', 'integer', 'min:1', 'max:' . $room->capacity],
        ]);

        $isTaken = Booking::where('room_id', $room->id)
            ->where('status', 'approved')
            ->where('check_in', '<', $validated['check_out'])
            ->where('check_out', '>', $validated['check_in'])
            ->exists();

        if ($isTaken) {
            return back()
                ->withInput()
                ->withErrors(['check_in' => 'Sorry, this room is already booked for the selected dates.']);
        }

        $nights = (int) Carbon::parse($validated['check_in'])
            ->diffInDays(Carbon::parse($validated['check_out']));

        Booking::create([
            'room_id'     => $room->id,
            'user_id'     => auth()->id(),
            'guest_name'  => $validated['guest_name'],
            'email'       => $validated['email'],
            'phone'       => $validated['phone'],
            'check_in'    => $validated['check_in'],
            'check_out'   => $validated['check_out'],
            'guests'      => $validated['guests'],
            'total_price' => $nights * $room->price_per_night,
            'status'      => 'pending',
        ]);

        return redirect()
            ->route('rooms.show', $room)
            ->with('success', 'Your booking request has been sent. We will contact you soon.');
    }
}
