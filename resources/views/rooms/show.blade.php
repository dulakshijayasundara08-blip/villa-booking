@extends('layouts.public')

@section('title', $room->name)

@section('content')

    {{-- Room banner --}}
    <section class="relative bg-emerald-900 text-white">
        @if ($room->image)
            <img src="{{ asset($room->image) }}" alt="{{ $room->name }}"
                 class="absolute inset-0 w-full h-full object-cover">
        @endif
        <div class="absolute inset-0 bg-black/55"></div>

        <div class="relative max-w-6xl mx-auto px-4 py-20 text-center">
            <p class="uppercase tracking-widest text-amber-300 text-sm mb-2">Green Valley Villa</p>
            <h1 class="font-display text-4xl md:text-5xl font-bold">{{ $room->name }}</h1>
            <p class="mt-3 text-stone-100">
                Up to {{ $room->capacity }} {{ \Illuminate\Support\Str::plural('guest', $room->capacity) }}
                &middot; Rs. {{ number_format($room->price_per_night) }} / night
            </p>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 py-12 grid gap-10 lg:grid-cols-3">

        {{-- Left: details + reviews --}}
        <div class="lg:col-span-2">
            <h2 class="font-display text-2xl font-bold mb-3">About this room</h2>
            <p class="text-stone-600 leading-relaxed">{{ $room->description }}</p>

            {{-- Reviews --}}
            <div class="mt-12">
                <div class="flex items-center justify-between mb-5">
                    <h2 class="font-display text-2xl font-bold">Guest Reviews</h2>
                    @if ($averageRating)
                        <span class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-sm font-semibold">
                            ★ {{ number_format($averageRating, 1) }} / 5 ({{ $reviews->count() }})
                        </span>
                    @endif
                </div>

                <div class="space-y-4">
                    @forelse ($reviews as $review)
                        <div class="bg-white rounded-xl shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <p class="font-semibold">{{ $review->guest_name }}</p>
                                <p class="text-amber-500">
                                    {{ str_repeat('★', $review->rating) }}<span class="text-stone-300">{{ str_repeat('★', 5 - $review->rating) }}</span>
                                </p>
                            </div>
                            <p class="text-stone-600 text-sm mt-2">{{ $review->comment }}</p>
                            <p class="text-xs text-stone-400 mt-2">{{ $review->created_at->format('M d, Y') }}</p>
                        </div>
                    @empty
                        <p class="text-stone-500">No reviews yet. Be the first to write one!</p>
                    @endforelse
                </div>

                {{-- Review form --}}
                <div class="bg-white rounded-xl shadow-sm p-6 mt-8">
                    <h3 class="font-semibold text-lg mb-4">Write a review</h3>

                    <form method="POST" action="{{ route('reviews.store', $room) }}" class="space-y-4">
                        @csrf

                        <div>
                            <label for="r_name" class="block text-sm font-medium mb-1">Your name</label>
                            <input id="r_name" type="text" name="guest_name" value="{{ old('guest_name') }}"
                                   class="w-full border border-stone-300 rounded-lg px-3 py-2">
                            @error('guest_name') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="r_rating" class="block text-sm font-medium mb-1">Rating</label>
                            <select id="r_rating" name="rating" class="w-full border border-stone-300 rounded-lg px-3 py-2">
                                @for ($i = 5; $i >= 1; $i--)
                                    <option value="{{ $i }}" @selected(old('rating', 5) == $i)>{{ $i }} {{ \Illuminate\Support\Str::plural('star', $i) }}</option>
                                @endfor
                            </select>
                            @error('rating') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="r_comment" class="block text-sm font-medium mb-1">Your review</label>
                            <textarea id="r_comment" name="comment" rows="3"
                                      class="w-full border border-stone-300 rounded-lg px-3 py-2">{{ old('comment') }}</textarea>
                            @error('comment') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit"
                                class="bg-emerald-700 text-white font-semibold px-6 py-2 rounded-full hover:bg-emerald-800">
                            Submit Review
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Right: booking form --}}
        <aside>
            <div class="bg-white rounded-2xl shadow-lg p-6 lg:sticky lg:top-24">
                <p class="text-emerald-700 font-bold text-2xl">
                    Rs. {{ number_format($room->price_per_night) }}
                    <span class="text-sm text-stone-500 font-normal">/ night</span>
                </p>
                <h3 class="font-display text-xl font-bold mt-1 mb-4">Book this room</h3>

                <form method="POST" action="{{ route('bookings.store', $room) }}" class="space-y-4"
                      id="booking-form" data-price="{{ $room->price_per_night }}">
                    @csrf
                                        @if ($errors->any())
                        <div class="bg-red-50 text-red-700 text-sm rounded-lg p-3">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <label for="guest_name" class="block text-sm font-medium mb-1">Full name</label>
                        <input id="guest_name" type="text" name="guest_name" value="{{ old('guest_name') }}"
                               class="w-full border border-stone-300 rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium mb-1">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                               class="w-full border border-stone-300 rounded-lg px-3 py-2">
                        @error('email') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium mb-1">Phone</label>
                        <input id="phone" type="text" name="phone" value="{{ old('phone') }}"
                               class="w-full border border-stone-300 rounded-lg px-3 py-2">
                        @error('phone') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label for="check_in" class="block text-sm font-medium mb-1">Check-in</label>
                            <input id="check_in" type="date" name="check_in" value="{{ old('check_in') }}"
                                   min="{{ date('Y-m-d') }}"
                                   class="w-full border border-stone-300 rounded-lg px-3 py-2">
                            @error('check_in') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="check_out" class="block text-sm font-medium mb-1">Check-out</label>
                            <input id="check_out" type="date" name="check_out" value="{{ old('check_out') }}"
                                   min="{{ date('Y-m-d') }}"
                                   class="w-full border border-stone-300 rounded-lg px-3 py-2">
                            @error('check_out') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="guests" class="block text-sm font-medium mb-1">Guests (max {{ $room->capacity }})</label>
                        <input id="guests" type="number" name="guests" min="1" max="{{ $room->capacity }}"
                               value="{{ old('guests', 1) }}"
                               class="w-full border border-stone-300 rounded-lg px-3 py-2">
                        @error('guests') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div id="price-box" class="hidden bg-emerald-50 rounded-lg p-4 text-sm">
                        <div class="flex justify-between">
                            <span id="nights-text"></span>
                        </div>
                        <div class="flex justify-between font-bold text-emerald-800 mt-1">
                            <span>Estimated total</span>
                            <span id="total-text"></span>
                        </div>
                    </div>

                    <button type="submit"
                            class="w-full bg-amber-500 text-stone-900 font-semibold py-3 rounded-full hover:bg-amber-400">
                        Send Booking Request
                    </button>
                    <p class="text-xs text-stone-500 text-center">You will not be charged now. We will confirm your request.</p>
                </form>
            </div>
        </aside>
    </section>

    <script>
        (function () {
            var form = document.getElementById('booking-form');
            var checkIn = document.getElementById('check_in');
            var checkOut = document.getElementById('check_out');
            var box = document.getElementById('price-box');
            var nightsText = document.getElementById('nights-text');
            var totalText = document.getElementById('total-text');
            var price = parseFloat(form.dataset.price);

            function update() {
                if (!checkIn.value || !checkOut.value) { box.classList.add('hidden'); return; }
                var start = new Date(checkIn.value);
                var end = new Date(checkOut.value);
                var nights = Math.round((end - start) / 86400000);
                if (nights < 1) { box.classList.add('hidden'); return; }
                nightsText.textContent = nights + (nights === 1 ? ' night' : ' nights');
                totalText.textContent = 'Rs. ' + (nights * price).toLocaleString('en-US');
                box.classList.remove('hidden');
            }

            checkIn.addEventListener('change', function () {
                checkOut.min = checkIn.value;
                update();
            });
            checkOut.addEventListener('change', update);
            update();
        })();
    </script>

@endsection