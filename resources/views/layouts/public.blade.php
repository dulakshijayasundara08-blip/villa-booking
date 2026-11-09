<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Home') | Green Valley Villa</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        .font-display { font-family: 'Playfair Display', Georgia, serif; }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-50 text-stone-800 antialiased flex flex-col min-h-screen">


    {{-- Main header --}}
    <header class="bg-white shadow-sm sticky top-0 z-40">
        <nav class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="font-display text-2xl font-bold text-emerald-800">
                Green Valley <span class="text-amber-600">Villa</span>
            </a>

            {{-- Desktop menu --}}
            <div class="hidden md:flex items-center gap-8 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-emerald-700">Home</a>
                <a href="{{ route('rooms.index') }}" class="hover:text-emerald-700">Rooms</a>
                <a href="{{ route('about') }}" class="hover:text-emerald-700">About</a>
                <a href="{{ route('contact.create') }}" class="hover:text-emerald-700">Contact</a>

                <a href="{{ route('rooms.index') }}"
                   class="bg-emerald-700 text-white px-5 py-2 rounded-full hover:bg-emerald-800">
                    Book Now
                </a>

                @auth
                    <a href="{{ route('dashboard') }}" class="hover:text-emerald-700">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:text-emerald-700">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-emerald-700">Login</a>
                @endauth
            </div>

            {{-- Mobile menu button --}}
            <button id="menu-btn" type="button" class="md:hidden text-3xl text-emerald-800" aria-label="Open menu">
                &#9776;
            </button>
        </nav>

        {{-- Mobile menu --}}
        <div id="mobile-menu" class="hidden md:hidden border-t bg-white">
            <div class="max-w-6xl mx-auto px-4 py-4 flex flex-col gap-3 text-sm font-medium">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('rooms.index') }}">Rooms</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('contact.create') }}">Contact</a>
                @auth
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endauth
            </div>
        </div>
    </header>

        

    {{-- Flash messages --}}
    @if (session('success'))
        <div class="max-w-6xl mx-auto mt-4 px-4 w-full">
            <div class="bg-emerald-100 text-emerald-800 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="max-w-6xl mx-auto mt-4 px-4 w-full">
            <div class="bg-red-100 text-red-800 px-4 py-3 rounded-lg">
                {{ session('error') }}
            </div>
        </div>
    @endif

    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-emerald-950 text-emerald-100 mt-16">
        <div class="max-w-6xl mx-auto px-4 py-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
            <div>
                <h3 class="font-display text-xl text-white mb-3">Green Valley Villa</h3>
                <p class="text-sm text-emerald-200">
                    A peaceful hillside retreat with comfortable rooms, green views and friendly service.
                </p>
            </div>

            <div>
                <h4 class="font-semibold text-white mb-3">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                    <li><a href="{{ route('rooms.index') }}" class="hover:text-white">Rooms</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white">About Us</a></li>
                    <li><a href="{{ route('contact.create') }}" class="hover:text-white">Contact</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold text-white mb-3">Contact</h4>
                <ul class="space-y-2 text-sm">
                    <li>📍 Hill Country, Sri Lanka</li>
                    <li>📞 +94 77 123 4567</li>
                    <li>✉️ info@greenvalleyvilla.lk</li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold text-white mb-3">Reception Hours</h4>
                <ul class="space-y-2 text-sm">
                    <li>Check-in: 2:00 PM</li>
                    <li>Check-out: 11:00 AM</li>
                    <li>Reception: 7:00 AM &ndash; 10:00 PM</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-emerald-900">
            <div class="max-w-6xl mx-auto px-4 py-5 text-xs text-center text-emerald-300">
                &copy; {{ date('Y') }} Green Valley Villa. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('menu-btn').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

</body>
</html>