@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')

    <section class="max-w-6xl mx-auto px-4 py-12">

        <div class="mb-8">
            <h1 class="font-display text-3xl font-bold">Admin Dashboard</h1>
            <p class="text-stone-500 text-sm mt-1">Welcome back, {{ auth()->user()->name }}. Here is what is happening at the villa.</p>
        </div>

        {{-- Stat cards --}}
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-5">
            <a href="{{ route('admin.rooms.index') }}" class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition">
                <p class="text-xs uppercase tracking-wide text-stone-500">Rooms</p>
                <p class="font-display text-4xl font-bold text-emerald-800 mt-2">{{ $stats['rooms'] }}</p>
            </a>
            <a href="{{ route('admin.bookings.index') }}" class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition">
                <p class="text-xs uppercase tracking-wide text-stone-500">Pending bookings</p>
                <p class="font-display text-4xl font-bold text-amber-600 mt-2">{{ $stats['pending'] }}</p>
            </a>
            <a href="{{ route('admin.bookings.index') }}" class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition">
                <p class="text-xs uppercase tracking-wide text-stone-500">Approved bookings</p>
                <p class="font-display text-4xl font-bold text-emerald-800 mt-2">{{ $stats['approved'] }}</p>
            </a>
            <a href="{{ route('admin.messages.index') }}" class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition">
                <p class="text-xs uppercase tracking-wide text-stone-500">Unread messages</p>
                <p class="font-display text-4xl font-bold text-red-600 mt-2">{{ $stats['messages'] }}</p>
            </a>
            <div class="bg-white rounded-2xl shadow p-6">
                <p class="text-xs uppercase tracking-wide text-stone-500">Reviews</p>
                <p class="font-display text-4xl font-bold text-emerald-800 mt-2">{{ $stats['reviews'] }}</p>
            </div>
        </div>

        <div class="grid gap-8 lg:grid-cols-3 mt-10">

            {{-- Latest bookings --}}
            <div class="lg:col-span-2 bg-white rounded-2xl shadow overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 border-b">
                    <h2 class="font-semibold text-lg">Latest Bookings</h2>
                    <a href="{{ route('admin.bookings.index') }}" class="text-sm text-emerald-700 hover:underline">View all</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-stone-100 text-stone-600 uppercase text-xs">
                            <tr>
                                <th class="px-5 py-3">Guest</th>
                                <th class="px-5 py-3">Room</th>
                                <th class="px-5 py-3">Dates</th>
                                <th class="px-5 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @forelse ($latestBookings as $booking)
                                @php
                                    $badge = [
                                        'pending'  => 'bg-amber-100 text-amber-800',
                                        'approved' => 'bg-emerald-100 text-emerald-800',
                                        'rejected' => 'bg-red-100 text-red-800',
                                    ][$booking->status] ?? 'bg-stone-100 text-stone-700';
                                @endphp
                                <tr>
                                    <td class="px-5 py-3 font-medium">{{ $booking->guest_name }}</td>
                                    <td class="px-5 py-3">{{ $booking->room->name ?? 'Deleted room' }}</td>
                                    <td class="px-5 py-3 whitespace-nowrap">
                                        {{ $booking->check_in->format('M d') }} &ndash; {{ $booking->check_out->format('M d') }}
                                    </td>
                                    <td class="px-5 py-3">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $badge }}">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-5 py-8 text-center text-stone-500">No bookings yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Latest messages --}}
            <div class="bg-white rounded-2xl shadow overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 border-b">
                    <h2 class="font-semibold text-lg">Latest Messages</h2>
                    <a href="{{ route('admin.messages.index') }}" class="text-sm text-emerald-700 hover:underline">View all</a>
                </div>

                <ul class="divide-y">
                    @forelse ($latestMessages as $message)
                        <li class="px-6 py-4">
                            <div class="flex items-center justify-between gap-2">
                                <p class="font-medium">{{ $message->name }}</p>
                                @unless ($message->is_read)
                                    <span class="text-xs bg-red-100 text-red-700 px-2 py-0.5 rounded-full">New</span>
                                @endunless
                            </div>
                            <p class="text-sm text-stone-500 mt-1">
                                {{ \Illuminate\Support\Str::limit($message->message, 60) }}
                            </p>
                        </li>
                    @empty
                        <li class="px-6 py-8 text-center text-stone-500 text-sm">No messages yet.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </section>

@endsection