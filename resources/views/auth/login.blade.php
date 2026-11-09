@extends('layouts.public')

@section('title', 'Login')

@section('content')

    <section class="max-w-5xl mx-auto px-4 py-14">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden grid md:grid-cols-2">

            {{-- Left: photo panel --}}
            <div class="relative hidden md:block min-h-[32rem]">
                <img src="{{ asset('images/hero.jpg') }}" alt=""
                     class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-emerald-950/70"></div>

                <div class="relative h-full flex flex-col justify-end p-10 text-white">
                    <p class="uppercase tracking-[0.3em] text-amber-300 text-xs mb-3">Welcome back</p>
                    <h2 class="font-display text-3xl font-bold mb-3">Your calm escape is waiting</h2>
                    <p class="text-emerald-100 text-sm">
                        Log in to see your booking requests and manage your stay at Green Valley Villa.
                    </p>
                </div>
            </div>

            {{-- Right: login form --}}
            <div class="p-8 md:p-12 flex flex-col justify-center">
                <h1 class="font-display text-3xl font-bold mb-1">Login</h1>
                <p class="text-stone-500 text-sm mb-6">Enter your details to continue.</p>

                @if (session('status'))
                    <div class="bg-emerald-100 text-emerald-800 text-sm rounded-lg p-3 mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-stone-700 mb-1">Email address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                               required autofocus autocomplete="username" placeholder="you@example.com"
                               class="w-full border border-stone-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
                        @error('email')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-stone-700 mb-1">Password</label>
                        <input id="password" type="password" name="password"
                               required autocomplete="current-password" placeholder="Your password"
                               class="w-full border border-stone-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
                        @error('password')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <label class="flex items-center gap-2 text-sm text-stone-600">
                        <input type="checkbox" name="remember" class="rounded border-stone-300 text-emerald-700 focus:ring-emerald-300">
                        Remember me
                    </label>

                    <button type="submit"
                            class="w-full bg-emerald-700 text-white font-semibold py-3 rounded-full hover:bg-emerald-800 transition">
                        Login
                    </button>
                </form>

                <p class="text-sm text-stone-600 mt-6 text-center">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-emerald-700 font-semibold hover:underline">Create one</a>
                </p>
            </div>
        </div>
    </section>

@endsection
