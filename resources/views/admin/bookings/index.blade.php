@extends('layouts.admin')

@section('title', 'Bookings')

@section('content')

    <section class="max-w-6xl mx-auto px-4 py-10">
        <div class="mb-8">
            <h1 class="font-display text-3xl font-bold">Manage Bookings</h1>
            <p class="text-stone-500 text-sm mt-1">
                {{ $bookings->count() }} {{ \Illuminate\Support\Str::plural('booking', $bookings->count()) }} in total
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-stone-100 text-stone-600 uppercase text-xs">
                        <tr>
                            <th class="px-5 py-3">Guest</th>
                            <th class="px-5 py-3">Room</th>
                            <th class="px-5 py-3">Dates</th>
                            <th class="px-5 py-3">Total</th>
                            <th class="px-5 py-3">Status</th>
                            <th class="px-5 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse ($bookings as $booking)
                            @php
                                $badge = [
                                    'pending'  => 'bg-amber-100 text-amber-800',
                                    'approved' => 'bg-emerald-100 text-emerald-800',
                                    'rejected' => 'bg-red-100 text-red-800',
                                ][$booking->status] ?? 'bg-stone-100 text-stone-700';
                                $nights = (int) $booking->check_in->diffInDays($booking->check_out);
                            @endphp
                            <tr class="hover:bg-stone-50 align-top">
                                <td class="px-5 py-4">
                                    <p class="font-semibold">{{ $booking->guest_name }}</p>
                                    <p class="text-xs text-stone-500">{{ $booking->email }}</p>
                                    <p class="text-xs text-stone-500">{{ $booking->phone }}</p>
                                </td>
                                <td class="px-5 py-4">
                                    <p>{{ $booking->room->name ?? 'Deleted room' }}</p>
                                    <p class="text-xs text-stone-500">
                                        {{ $booking->guests }} {{ \Illuminate\Support\Str::plural('guest', $booking->guests) }}
                                    </p>
                                </td>
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <p>{{ $booking->check_in->format('M d, Y') }}</p>
                                    <p class="text-xs text-stone-500">
                                        to {{ $booking->check_out->format('M d, Y') }} ({{ $nights }} {{ \Illuminate\Support\Str::plural('night', $nights) }})
                                    </p>
                                </td>
                                <td class="px-5 py-4 font-semibold whitespace-nowrap">
                                    Rs. {{ number_format($booking->total_price) }}
                                </td>
                                <td class="px-5 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $badge }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center justify-end gap-2">
                                        @if ($booking->status !== 'approved')
                                            <form method="POST" action="{{ route('admin.bookings.approve', $booking) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                        class="bg-emerald-700 text-white text-xs font-semibold px-4 py-2 rounded-full hover:bg-emerald-800">
                                                    Approve
                                                </button>
                                            </form>
                                        @endif

                                        @if ($booking->status !== 'rejected')
                                            <form method="POST" action="{{ route('admin.bookings.reject', $booking) }}"
                                                  onsubmit="return confirm('Reject this booking?');">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                        class="border border-red-300 text-red-600 text-xs font-semibold px-4 py-2 rounded-full hover:bg-red-50">
                                                    Reject
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-5 py-10 text-center text-stone-500">
                                    No bookings yet. Booking requests from guests will appear here.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection