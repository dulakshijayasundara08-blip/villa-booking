@extends('layouts.admin')

@section('title', 'Manage Rooms')

@section('content')

    <section class="max-w-6xl mx-auto px-4 py-12">
        <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="font-display text-3xl font-bold">Manage Rooms</h1>
                <p class="text-stone-500 text-sm mt-1">{{ $rooms->count() }} {{ \Illuminate\Support\Str::plural('room', $rooms->count()) }} in total</p>
            </div>
            <a href="{{ route('admin.rooms.create') }}"
               class="bg-emerald-700 text-white font-semibold px-6 py-3 rounded-full hover:bg-emerald-800 transition">
                + Add Room
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-stone-100 text-stone-600 uppercase text-xs">
                        <tr>
                            <th class="px-5 py-3">Room</th>
                            <th class="px-5 py-3">Price / night</th>
                            <th class="px-5 py-3">Guests</th>
                            <th class="px-5 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse ($rooms as $room)
                            <tr class="hover:bg-stone-50">
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-4">
                                        @if ($room->image)
                                            <img src="{{ asset($room->image) }}" alt="{{ $room->name }}"
                                                 class="w-16 h-12 object-cover rounded-lg">
                                        @else
                                            <div class="w-16 h-12 rounded-lg bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold">
                                                {{ substr($room->name, 0, 1) }}
                                            </div>
                                        @endif
                                        <span class="font-semibold">{{ $room->name }}</span>
                                    </div>
                                </td>
                                <td class="px-5 py-4">Rs. {{ number_format($room->price_per_night) }}</td>
                                <td class="px-5 py-4">{{ $room->capacity }}</td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('rooms.show', $room) }}" target="_blank"
                                           class="text-stone-600 hover:underline">View</a>
                                        <a href="{{ route('admin.rooms.edit', $room) }}"
                                           class="text-emerald-700 font-medium hover:underline">Edit</a>
                                        <form method="POST" action="{{ route('admin.rooms.destroy', $room) }}"
                                              onsubmit="return confirm('Delete this room? Its bookings and reviews will also be deleted.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 font-medium hover:underline">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-5 py-10 text-center text-stone-500">
                                    No rooms yet. Click "Add Room" to create the first one.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection