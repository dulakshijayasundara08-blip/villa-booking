@extends('layouts.public')

@section('title', 'My Dashboard')

@section('content')

    {{-- Banner --}}
    <section class="relative bg-emerald-900 text-white">
        <img src="{{ asset('images/hero.jpg') }}" alt=""
             class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/60"></div>

        <div class="relative max-w-6xl mx-auto px-4 py-14">
            <p class="uppercase tracking-widest text-amber-300 text-sm mb-2">My Account</p>
            <h1 class="font-display text-3xl md:text-4xl font-bold">Welcome, {{ auth()->user()->name }}</h1>
            <p class="text-stone-100 mt-2">Track your booking requests and plan your next stay.</p>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 py-12">

        {{-- Stat cards --}}
        <div class="grid gap-5 sm:grid-cols-3">
            <div class="bg-white rounded-2xl shadow p-6">
                <p class="text-xs uppercase tracking-wide text-stone-500">Total requests</p>
                <p class="font-display text-4xl font-bold text-emerald-800 mt-2">{{ $stats['total'] }}</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-6">
                <p class="text-xs uppercase tracking-wide text-stone-500">Waiting for reply</p>
                <p class="font-display text-4xl font-bold text-amber-600 mt-2">{{ $stats['pending'] }}</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-6">
                <p class="text-xs uppercase tracking-wide text-stone-500">Confirmed</p>
                <p class="font-display text-4xl font-bold text-emerald-800 mt-2">{{ $stats['approved'] }}</p>
            </div>
        </div>

        {{-- Bookings --}}
        <div class="flex flex-wrap items-center justify-between gap-4 mt-12 mb-6">
            <h2 class="font-display text-2xl font-bold">My Bookings</h2>
            <a href="{{ route('rooms.index') }}"
               class="bg-emerald-700 text-white text-sm font-semibold px-6 py-2.5 rounded-full hover:bg-emerald-800 transition">
                + Book Another Room
            </a>
        </div>

        <div class="space-y-5">
            @forelse ($bookings as $booking)
                @php
                    $badge = [
                        'pending'  => 'bg-amber-100 text-amber-800',
                        'approved' => 'bg-emerald-100 text-emerald-800',
                        'rejected' => 'bg-red-100 text-red-800',
                    ][$booking->status] ?? 'bg-stone-100 text-stone-700';

                    $note = [
                        'pending'  => 'We received your request and will reply soon.',
                        'approved' => 'Your booking is confirmed. We look forward to seeing you!',
                        'rejected' => 'Sorry, we could not confirm this booking. Please contact us for other dates.',
                    ][$booking->status] ?? '';

                    $nights = (int) $booking->check_in->diffInDays($booking->check_out);
                @endphp

                <div class="bg-white rounded-2xl shadow overflow-hidden flex flex-col sm:flex-row">
                    @if ($booking->room && $booking->room->image)
                        <img src="{{ asset($booking->room->image) }}" alt="{{ $booking->room->name }}"
                             class="w-full sm:w-56 h-44 sm:h-auto object-cover">
                    @else
                        <div class="w-full sm:w-56 h-44 sm:h-auto bg-emerald-100 flex items-center justify-center text-5xl font-bold text-emerald-700">
                            {{ substr($booking->room->name ?? 'R', 0, 1) }}
                        </div>
                    @endif

                    <div class="p-6 flex-1">
                        <div class="flex flex-wrap items-start justify-between gap-3">
                            <div>
                                <h3 class="font-display text-xl font-semibold">
                                    {{ $booking->room->name ?? 'Room no longer available' }}
                                </h3>
                                <p class="text-xs text-stone-500 mt-1">
                                    Requested on {{ $booking->created_at->format('M d, Y') }}
                                </p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $badge }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-5 text-sm">
                            <div>
                                <p class="text-xs uppercase text-stone-500">Check-in</p>
                                <p class="font-medium">{{ $booking->check_in->format('M d, Y') }}</p>
                            </div>
                            <div>
                                <p class="text-xs uppercase text-stone-500">Check-out</p>
                                <p class="font-medium">{{ $booking->check_out->format('M d, Y') }}</p>
                            </div>
                            <div>
                                <p class="text-xs uppercase text-stone-500">Stay</p>
                                <p class="font-medium">
                                    {{ $nights }} {{ \Illuminate\Support\Str::plural('night', $nights) }},
                                    {{ $booking->guests }} {{ \Illuminate\Support\Str::plural('guest', $booking->guests) }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs uppercase text-stone-500">Total</p>
                                <p class="font-bold text-emerald-700">Rs. {{ number_format($booking->total_price) }}</p>
                            </div>
                        </div>

                        @if ($note)
                            <p class="text-sm text-stone-600 mt-5 pt-4 border-t">{{ $note }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-2xl shadow p-12 text-center">
                    <p class="text-5xl mb-3">🛏️</p>
                    <h3 class="font-semibold text-lg mb-1">No bookings yet</h3>
                    <p class="text-stone-500 text-sm mb-6">When you send a booking request, it will appear here.</p>
                    <a href="{{ route('rooms.index') }}"
                       class="inline-block bg-emerald-700 text-white font-semibold px-8 py-3 rounded-full hover:bg-emerald-800">
                        Browse Rooms
                    </a>
                </div>
            @endforelse
        </div>
    </section>

@endsection