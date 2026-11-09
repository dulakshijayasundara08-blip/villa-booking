@extends('layouts.public')

@section('title', 'Contact Us')

@section('content')

    {{-- 1. Banner --}}
    <section class="relative bg-emerald-900 text-white">
        <img src="{{ asset('images/hero.jpg') }}" alt=""
             class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/60"></div>

        <div class="relative max-w-6xl mx-auto px-4 pt-20 pb-32 text-center">
            <p class="uppercase tracking-[0.3em] text-amber-300 text-sm mb-3">Get in Touch</p>
            <h1 class="font-display text-4xl md:text-5xl font-bold">Contact Us</h1>
            <p class="text-stone-100 mt-3 max-w-xl mx-auto">
                Questions about a room or a booking? Our team is happy to help.
            </p>
        </div>
    </section>

    {{-- 2. Contact card (details + form) --}}
    <section class="max-w-6xl mx-auto px-4 -mt-16 relative z-10">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden grid lg:grid-cols-5">

            {{-- Left: contact details --}}
            <div class="lg:col-span-2 bg-emerald-900 text-white p-8 md:p-10 flex flex-col">
                <h2 class="font-display text-2xl font-bold mb-2">Contact Information</h2>
                <p class="text-emerald-200 text-sm mb-8">
                    Reach us any time. We usually reply within one day.
                </p>

                <ul class="space-y-6">
                    <li class="flex items-start gap-4">
                        <span class="flex-shrink-0 w-11 h-11 rounded-full bg-emerald-800 flex items-center justify-center text-amber-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                        </span>
                        <div>
                            <p class="font-semibold">Address</p>
                            <p class="text-emerald-100 text-sm">Green Valley Villa<br>Hill Country, Sri Lanka</p>
                        </div>
                    </li>

                    <li class="flex items-start gap-4">
                        <span class="flex-shrink-0 w-11 h-11 rounded-full bg-emerald-800 flex items-center justify-center text-amber-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                        </span>
                        <div>
                            <p class="font-semibold">Phone</p>
                            <a href="tel:+94771234567" class="text-emerald-100 text-sm hover:text-white">+94 77 123 4567</a>
                        </div>
                    </li>

                    <li class="flex items-start gap-4">
                        <span class="flex-shrink-0 w-11 h-11 rounded-full bg-emerald-800 flex items-center justify-center text-amber-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </span>
                        <div>
                            <p class="font-semibold">Email</p>
                            <a href="mailto:info@greenvalleyvilla.lk" class="text-emerald-100 text-sm hover:text-white">info@greenvalleyvilla.lk</a>
                        </div>
                    </li>

                    <li class="flex items-start gap-4">
                        <span class="flex-shrink-0 w-11 h-11 rounded-full bg-emerald-800 flex items-center justify-center text-amber-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <div>
                            <p class="font-semibold">Reception Hours</p>
                            <p class="text-emerald-100 text-sm">Every day, 7:00 AM &ndash; 10:00 PM</p>
                        </div>
                    </li>
                </ul>

                <div class="mt-auto pt-10">
                    <a href="https://wa.me/94771234567" target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-400 text-white font-semibold px-6 py-3 rounded-full text-sm">
                        Chat on WhatsApp
                    </a>
                </div>
            </div>

            {{-- Right: contact form --}}
            <div class="lg:col-span-3 p-8 md:p-10">
                <h2 class="font-display text-2xl font-bold mb-1">Send Us a Message</h2>
                <p class="text-stone-500 text-sm mb-6">Fill in the form and we will get back to you soon.</p>

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                    @csrf

                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-700 text-sm rounded-lg p-3">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="name" class="block text-sm font-medium text-stone-700 mb-1">Your name</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="John Silva"
                                   class="w-full border border-stone-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-stone-700 mb-1">Email address</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com"
                                   class="w-full border border-stone-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
                        </div>
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-stone-700 mb-1">Subject <span class="text-stone-400 font-normal">(optional)</span></label>
                        <input id="subject" type="text" name="subject" value="{{ old('subject') }}" placeholder="Booking enquiry"
                               class="w-full border border-stone-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-stone-700 mb-1">Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Write your message here..."
                                  class="w-full border border-stone-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit"
                            class="bg-emerald-700 text-white font-semibold px-8 py-3 rounded-full hover:bg-emerald-800 transition">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>

    {{-- 3. Map --}}
    <section class="max-w-6xl mx-auto px-4 py-16">
        <div class="text-center mb-8">
            <h2 class="font-display text-3xl font-bold">Find Us</h2>
            <p class="text-stone-500 mt-2">Visit us in the hills.</p>
        </div>
        <div class="rounded-2xl overflow-hidden shadow-lg">
            <iframe
                src="https://maps.google.com/maps?q=Nuwara%20Eliya%2C%20Sri%20Lanka&t=&z=11&ie=UTF8&iwloc=&output=embed"
                width="100%" height="380" style="border:0;" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" title="Map"></iframe>
        </div>
    </section>

    {{-- 4. FAQ --}}
    <section class="bg-emerald-50 py-16">
        <div class="max-w-3xl mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="font-display text-3xl font-bold">Frequently Asked Questions</h2>
            </div>

            <div class="space-y-3">
                <details class="bg-white rounded-xl shadow-sm p-5 group">
                    <summary class="font-semibold cursor-pointer">What time is check-in and check-out?</summary>
                    <p class="text-stone-600 text-sm mt-3">Check-in is from 2:00 PM and check-out is until 11:00 AM.</p>
                </details>
                <details class="bg-white rounded-xl shadow-sm p-5 group">
                    <summary class="font-semibold cursor-pointer">How does booking work?</summary>
                    <p class="text-stone-600 text-sm mt-3">Choose a room, send a booking request with your dates, and we will confirm it by email or phone.</p>
                </details>
                <details class="bg-white rounded-xl shadow-sm p-5 group">
                    <summary class="font-semibold cursor-pointer">Do I pay when I send the request?</summary>
                    <p class="text-stone-600 text-sm mt-3">No. Sending a request is free. We will tell you the payment details when we confirm your booking.</p>
                </details>
                <details class="bg-white rounded-xl shadow-sm p-5 group">
                    <summary class="font-semibold cursor-pointer">Can I bring my family?</summary>
                    <p class="text-stone-600 text-sm mt-3">Yes. We have family rooms. Check the maximum number of guests on each room page.</p>
                </details>
            </div>
        </div>
    </section>

@endsection