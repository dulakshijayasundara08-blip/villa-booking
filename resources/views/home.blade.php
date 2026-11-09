@extends('layouts.public')

@section('title', 'Home')

@section('content')

    {{-- 1. Hero --}}
    <section class="relative bg-emerald-900 text-white">
        <img src="{{ asset('images/hero.jpg') }}" alt=""
             class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative max-w-6xl mx-auto px-4 py-32 md:py-44 text-center">
            <p class="uppercase tracking-[0.3em] text-amber-300 text-sm mb-4">Welcome to</p>
            <h1 class="font-display text-5xl md:text-7xl font-bold mb-6">Green Valley Villa</h1>
            <p class="text-lg md:text-xl text-stone-100 max-w-2xl mx-auto mb-10">
                A peaceful hillside retreat surrounded by nature. Relax in comfortable rooms and enjoy a stay you will remember.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('rooms.index') }}"
                   class="bg-amber-500 text-stone-900 font-semibold px-8 py-3 rounded-full hover:bg-amber-400">
                    Book a Room
                </a>
                <a href="{{ route('contact.create') }}"
                   class="border border-white text-white font-semibold px-8 py-3 rounded-full hover:bg-white hover:text-emerald-900">
                    Contact Us
                </a>
            </div>
        </div>
    </section>

    {{-- 2. Quick facts strip --}}
    <section class="bg-white border-b">
        <div class="max-w-6xl mx-auto px-4 py-6 grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
            <div>
                <p class="font-display text-2xl text-emerald-800 font-bold">{{ $rooms->count() }}+</p>
                <p class="text-xs uppercase tracking-wide text-stone-500">Rooms</p>
            </div>
            <div>
                <p class="font-display text-2xl text-emerald-800 font-bold">2:00 PM</p>
                <p class="text-xs uppercase tracking-wide text-stone-500">Check-in</p>
            </div>
            <div>
                <p class="font-display text-2xl text-emerald-800 font-bold">11:00 AM</p>
                <p class="text-xs uppercase tracking-wide text-stone-500">Check-out</p>
            </div>
            <div>
                <p class="font-display text-2xl text-emerald-800 font-bold">24/7</p>
                <p class="text-xs uppercase tracking-wide text-stone-500">Friendly Help</p>
            </div>
        </div>
    </section>

    {{-- 3. About --}}
    <section class="max-w-6xl mx-auto px-4 py-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <img src="{{ asset('images/about.jpg') }}" alt="Green Valley Villa garden and pool"
                     class="rounded-2xl shadow-xl w-full h-80 md:h-[26rem] object-cover bg-emerald-100">
                <div class="hidden md:block absolute -bottom-6 -right-6 bg-amber-500 text-stone-900 rounded-xl px-6 py-4 shadow-lg">
                    <p class="font-display text-2xl font-bold">Relax</p>
                    <p class="text-sm">in the hills</p>
                </div>
            </div>

            <div>
                <p class="uppercase tracking-widest text-amber-600 text-sm mb-2">About Us</p>
                <h2 class="font-display text-3xl md:text-4xl font-bold mb-5">
                    A Calm Place to Rest and Enjoy Nature
                </h2>
                <p class="text-stone-600 mb-4">
                    Green Valley Villa sits on a quiet hillside with green views, fresh air and a peaceful garden.
                    Whether you travel alone, with your partner or with your family, we have a room for you.
                </p>
                <p class="text-stone-600 mb-6">
                    Our team takes care of every detail so you can simply relax and enjoy your stay.
                </p>
                <ul class="space-y-2 text-stone-700 mb-8">
                    <li>✔ Clean and comfortable rooms</li>
                    <li>✔ Beautiful garden and mountain views</li>
                    <li>✔ Friendly and helpful staff</li>
                </ul>
                <a href="{{ route('about') }}"
                   class="inline-block bg-emerald-700 text-white font-semibold px-7 py-3 rounded-full hover:bg-emerald-800">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    {{-- 4. Why stay with us --}}
    <section class="bg-emerald-50 py-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="font-display text-3xl font-bold">Why Stay With Us</h2>
                <p class="text-stone-500 mt-2">Comfort, calm and friendly service in one place.</p>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                <div class="bg-white rounded-xl shadow p-7 text-center">
                    <div class="text-4xl mb-3">🌿</div>
                    <h3 class="font-semibold text-lg mb-1">Peaceful Surroundings</h3>
                    <p class="text-stone-600 text-sm">Fresh air, green views and a quiet place to rest away from the city.</p>
                </div>
                <div class="bg-white rounded-xl shadow p-7 text-center">
                    <div class="text-4xl mb-3">🛏️</div>
                    <h3 class="font-semibold text-lg mb-1">Comfortable Rooms</h3>
                    <p class="text-stone-600 text-sm">Clean, well-kept rooms for solo travellers, couples and families.</p>
                </div>
                <div class="bg-white rounded-xl shadow p-7 text-center">
                    <div class="text-4xl mb-3">🤝</div>
                    <h3 class="font-semibold text-lg mb-1">Friendly Service</h3>
                    <p class="text-stone-600 text-sm">Our team is happy to help with anything you need during your stay.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- 5. Featured rooms --}}
    <section class="max-w-6xl mx-auto px-4 py-20">
        <div class="flex items-end justify-between mb-10">
            <div>
                <p class="uppercase tracking-widest text-amber-600 text-sm mb-2">Accommodation</p>
                <h2 class="font-display text-3xl md:text-4xl font-bold">Our Rooms</h2>
            </div>
            <a href="{{ route('rooms.index') }}" class="text-emerald-700 font-medium hover:underline hidden sm:block">
                View all rooms &rarr;
            </a>
        </div>

        <div class="grid gap-8 md:grid-cols-3">
            @forelse ($rooms as $room)
                <div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col hover:shadow-xl transition">
                    @if ($room->image)
                        <img src="{{ asset($room->image) }}" alt="{{ $room->name }}" class="h-56 w-full object-cover">
                    @else
                        <div class="h-56 bg-emerald-100 flex items-center justify-center text-5xl text-emerald-700 font-bold">
                            {{ substr($room->name, 0, 1) }}
                        </div>
                    @endif

                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="font-display text-xl font-semibold">{{ $room->name }}</h3>
                        <p class="text-sm text-stone-500 mt-1">Up to {{ $room->capacity }} guests</p>
                        <p class="text-sm text-stone-600 mt-3 flex-grow">
                            {{ \Illuminate\Support\Str::limit($room->description, 90) }}
                        </p>
                        <div class="flex items-center justify-between mt-5 pt-4 border-t">
                            <p class="text-emerald-700 font-bold">
                                Rs. {{ number_format($room->price_per_night) }}
                                <span class="text-xs text-stone-500 font-normal">/ night</span>
                            </p>
                            <a href="{{ route('rooms.show', $room) }}"
                               class="bg-emerald-700 text-white text-sm px-4 py-2 rounded-full hover:bg-emerald-800">
                                View
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-stone-500 col-span-3 text-center">No rooms available right now.</p>
            @endforelse
        </div>
    </section>

    {{-- 6. How booking works --}}
    <section class="bg-white py-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="font-display text-3xl font-bold">How Booking Works</h2>
                <p class="text-stone-500 mt-2">Three simple steps.</p>
            </div>

            <div class="grid gap-8 md:grid-cols-3">
                <div class="text-center">
                    <div class="mx-auto w-14 h-14 rounded-full bg-emerald-700 text-white flex items-center justify-center font-bold text-xl mb-3">1</div>
                    <h3 class="font-semibold mb-1">Choose a Room</h3>
                    <p class="text-stone-600 text-sm">Look at our rooms and pick the one you like.</p>
                </div>
                <div class="text-center">
                    <div class="mx-auto w-14 h-14 rounded-full bg-emerald-700 text-white flex items-center justify-center font-bold text-xl mb-3">2</div>
                    <h3 class="font-semibold mb-1">Send a Request</h3>
                    <p class="text-stone-600 text-sm">Fill in your details and choose your check-in and check-out dates.</p>
                </div>
                <div class="text-center">
                    <div class="mx-auto w-14 h-14 rounded-full bg-emerald-700 text-white flex items-center justify-center font-bold text-xl mb-3">3</div>
                    <h3 class="font-semibold mb-1">Get Confirmation</h3>
                    <p class="text-stone-600 text-sm">We review your request and confirm your booking.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- 7. Call to action --}}
    <section class="relative bg-emerald-900 text-white">
        <img src="{{ asset('images/hero.jpg') }}" alt=""
             class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-emerald-950/80"></div>

        <div class="relative max-w-6xl mx-auto px-4 py-16 text-center">
            <h2 class="font-display text-3xl md:text-4xl font-bold mb-3">Ready for a relaxing stay?</h2>
            <p class="text-emerald-100 mb-7">Book your room today and enjoy the calm of Green Valley Villa.</p>
            <a href="{{ route('rooms.index') }}"
               class="inline-block bg-amber-500 text-stone-900 font-semibold px-8 py-3 rounded-full hover:bg-amber-400">
                See Rooms &amp; Prices
            </a>
        </div>
    </section>

@endsection