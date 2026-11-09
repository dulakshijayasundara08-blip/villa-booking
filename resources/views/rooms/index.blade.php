@extends('layouts.public')

@section('title', 'Rooms')

@section('content')

    {{-- Page banner --}}
    <section class="relative bg-emerald-900 text-white">
        <img src="{{ asset('images/hero.jpg') }}" alt=""
             class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/60"></div>

        <div class="relative max-w-6xl mx-auto px-4 py-20 text-center">
            <p class="uppercase tracking-widest text-amber-300 text-sm mb-2">Accommodation</p>
            <h1 class="font-display text-4xl md:text-5xl font-bold">Our Rooms</h1>
            <p class="text-stone-100 mt-3">Find the perfect room for your stay.</p>
        </div>
    </section>

    {{-- Rooms grid --}}
    <section class="max-w-6xl mx-auto px-4 py-14">
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($rooms as $room)
                <div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col hover:shadow-xl transition">
                    @if ($room->image)
                        <img src="{{ asset($room->image) }}" alt="{{ $room->name }}" class="h-56 w-full object-cover">
                    @else
                        <div class="h-56 bg-emerald-100 flex items-center justify-center text-6xl text-emerald-700 font-bold">
                            {{ substr($room->name, 0, 1) }}
                        </div>
                    @endif

                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-start justify-between gap-2">
                            <h2 class="font-display text-xl font-semibold">{{ $room->name }}</h2>
                            <span class="text-xs bg-emerald-100 text-emerald-800 px-2 py-1 rounded-full whitespace-nowrap">
                                {{ $room->capacity }} {{ \Illuminate\Support\Str::plural('guest', $room->capacity) }}
                            </span>
                        </div>

                        <p class="text-sm text-stone-600 mt-3 flex-grow">
                            {{ \Illuminate\Support\Str::limit($room->description, 110) }}
                        </p>

                        <div class="flex items-center justify-between mt-5 pt-4 border-t">
                            <p class="text-emerald-700 font-bold text-lg">
                                Rs. {{ number_format($room->price_per_night) }}
                                <span class="text-xs text-stone-500 font-normal">/ night</span>
                            </p>
                            <a href="{{ route('rooms.show', $room) }}"
                               class="bg-emerald-700 text-white text-sm px-4 py-2 rounded-full hover:bg-emerald-800">
                                View &amp; Book
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-stone-500 col-span-full text-center py-10">
                    No rooms available right now. Please check again later.
                </p>
            @endforelse
        </div>
    </section>

@endsection