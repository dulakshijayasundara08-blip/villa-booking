@extends('layouts.public')

@section('title', 'About Us')

@section('content')

    {{-- Banner --}}
    <section class="relative bg-emerald-900 text-white">
        <img src="{{ asset('images/hero.jpg') }}" alt=""
             class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/60"></div>

        <div class="relative max-w-6xl mx-auto px-4 py-20 text-center">
            <p class="uppercase tracking-widest text-amber-300 text-sm mb-2">Our Story</p>
            <h1 class="font-display text-4xl md:text-5xl font-bold">About Green Valley Villa</h1>
            <p class="text-stone-100 mt-3">A quiet hillside retreat made for rest.</p>
        </div>
    </section>

    {{-- Story --}}
    <section class="max-w-6xl mx-auto px-4 py-16">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <img src="{{ asset('images/about.jpg') }}" alt="Green Valley Villa garden and pool"
                 class="rounded-2xl shadow-xl w-full h-80 md:h-[26rem] object-cover bg-emerald-100">

            <div>
                <p class="uppercase tracking-widest text-amber-600 text-sm mb-2">Who We Are</p>
                <h2 class="font-display text-3xl font-bold mb-5">Rest, Nature and Friendly Service</h2>
                <p class="text-stone-600 mb-4">
                    Green Valley Villa is a small family-run villa on a quiet hillside. We started with one idea:
                    give our guests a calm, clean and comfortable place to stay, surrounded by green views and fresh air.
                </p>
                <p class="text-stone-600 mb-4">
                    Our rooms are simple and well kept. Our team is always ready to help you plan your stay,
                    from a quiet weekend for two to a holiday with the whole family.
                </p>
                <p class="text-stone-600">
                    We hope you leave rested, happy and ready to come back.
                </p>
            </div>
        </div>
    </section>

    {{-- Values --}}
    <section class="bg-emerald-50 py-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="font-display text-3xl font-bold">What We Care About</h2>
                <p class="text-stone-500 mt-2">The things that make a good stay.</p>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                <div class="bg-white rounded-xl shadow p-7 text-center">
                    <div class="text-4xl mb-3">🧼</div>
                    <h3 class="font-semibold text-lg mb-1">Cleanliness</h3>
                    <p class="text-stone-600 text-sm">Every room is cleaned and checked before you arrive.</p>
                </div>
                <div class="bg-white rounded-xl shadow p-7 text-center">
                    <div class="text-4xl mb-3">🌄</div>
                    <h3 class="font-semibold text-lg mb-1">Beautiful Views</h3>
                    <p class="text-stone-600 text-sm">Wake up to green hills, fresh air and quiet mornings.</p>
                </div>
                <div class="bg-white rounded-xl shadow p-7 text-center">
                    <div class="text-4xl mb-3">💬</div>
                    <h3 class="font-semibold text-lg mb-1">Personal Service</h3>
                    <p class="text-stone-600 text-sm">We answer quickly and treat every guest like family.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Call to action --}}
    <section class="max-w-6xl mx-auto px-4 py-16 text-center">
        <h2 class="font-display text-3xl font-bold mb-3">Plan Your Stay With Us</h2>
        <p class="text-stone-600 mb-7">Choose a room, pick your dates and send a booking request.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('rooms.index') }}"
               class="bg-emerald-700 text-white font-semibold px-8 py-3 rounded-full hover:bg-emerald-800">
                View Rooms
            </a>
            <a href="{{ route('contact.create') }}"
               class="border border-emerald-700 text-emerald-700 font-semibold px-8 py-3 rounded-full hover:bg-emerald-50">
                Contact Us
            </a>
        </div>
    </section>

@endsection