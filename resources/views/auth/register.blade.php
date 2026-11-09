@extends('layouts.public')

@section('title', 'Create Account')

@section('content')

    <section class="max-w-5xl mx-auto px-4 py-14">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden grid md:grid-cols-2">

            {{-- Left: photo panel --}}
            <div class="relative hidden md:block min-h-[36rem]">
                <img src="{{ asset('images/about.jpg') }}" alt=""
                     class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-emerald-950/70"></div>

                <div class="relative h-full flex flex-col justify-end p-10 text-white">
                    <p class="uppercase tracking-[0.3em] text-amber-300 text-xs mb-3">Join us</p>
                    <h2 class="font-display text-3xl font-bold mb-3">Plan your perfect stay</h2>
                    <ul class="text-emerald-100 text-sm space-y-2">
                        <li>✔ Send booking requests in minutes</li>
                        <li>✔ Track the status of your bookings</li>
                        <li>✔ Fast and friendly support</li>
                    </ul>
                </div>
            </div>

            {{-- Right: register form --}}
            <div class="p-8 md:p-12 flex flex-col justify-center">
                <h1 class="font-display text-3xl font-bold mb-1">Create Account</h1>
                <p class="text-stone-500 text-sm mb-6">It only takes a minute.</p>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-stone-700 mb-1">Full name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}"
                               required autofocus autocomplete="name" placeholder="John Silva"
                               class="w-full border border-stone-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
                        @error('name')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-stone-700 mb-1">Email address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                               required autocomplete="username" placeholder="you@example.com"
                               class="w-full border border-stone-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
                        @error('email')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="password" class="block text-sm font-medium text-stone-700 mb-1">Password</label>
                            <input id="password" type="password" name="password"
                                   required autocomplete="new-password" placeholder="Min 8 characters"
                                   class="w-full border border-stone-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
                            @error('password')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-stone-700 mb-1">Confirm password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                   required autocomplete="new-password" placeholder="Repeat password"
                                   class="w-full border border-stone-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
                        </div>
                    </div>

                    <button type="submit"
                            class="w-full bg-emerald-700 text-white font-semibold py-3 rounded-full hover:bg-emerald-800 transition">
                        Create Account
                    </button>
                </form>

                <p class="text-sm text-stone-600 mt-6 text-center">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-emerald-700 font-semibold hover:underline">Login</a>
                </p>
            </div>
        </div>
    </section>

@endsection