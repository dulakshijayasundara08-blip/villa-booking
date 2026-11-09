<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') | Admin | Green Valley Villa</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        .font-display { font-family: 'Playfair Display', Georgia, serif; }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-100 text-stone-800 antialiased">

    @php
        $unreadMessages = \App\Models\ContactMessage::where('is_read', false)->count();
        $pendingBookings = \App\Models\Booking::where('status', 'pending')->count();
    @endphp

    <div class="min-h-screen flex flex-col md:flex-row">

        {{-- Sidebar --}}
        <aside class="md:w-64 flex-shrink-0 bg-emerald-950 text-emerald-100 flex flex-col">
            <div class="px-6 py-5 border-b border-emerald-900">
                <a href="{{ route('admin.dashboard') }}" class="font-display text-xl font-bold text-white">
                    Green Valley <span class="text-amber-400">Villa</span>
                </a>
                <p class="text-xs text-emerald-300 mt-1">Admin Panel</p>
            </div>

            <nav class="flex-1 p-4 flex md:flex-col gap-1 overflow-x-auto text-sm font-medium">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center justify-between px-4 py-2.5 rounded-lg whitespace-nowrap {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-800 text-white' : 'hover:bg-emerald-900' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.rooms.index') }}"
                   class="flex items-center justify-between px-4 py-2.5 rounded-lg whitespace-nowrap {{ request()->routeIs('admin.rooms.*') ? 'bg-emerald-800 text-white' : 'hover:bg-emerald-900' }}">
                    Rooms
                </a>
                <a href="{{ route('admin.bookings.index') }}"
                   class="flex items-center justify-between gap-3 px-4 py-2.5 rounded-lg whitespace-nowrap {{ request()->routeIs('admin.bookings.*') ? 'bg-emerald-800 text-white' : 'hover:bg-emerald-900' }}">
                    <span>Bookings</span>
                    @if ($pendingBookings > 0)
                        <span class="text-xs bg-amber-500 text-stone-900 font-bold px-2 py-0.5 rounded-full">{{ $pendingBookings }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.messages.index') }}"
                   class="flex items-center justify-between gap-3 px-4 py-2.5 rounded-lg whitespace-nowrap {{ request()->routeIs('admin.messages.*') ? 'bg-emerald-800 text-white' : 'hover:bg-emerald-900' }}">
                    <span>Messages</span>
                    @if ($unreadMessages > 0)
                        <span class="text-xs bg-red-500 text-white font-bold px-2 py-0.5 rounded-full">{{ $unreadMessages }}</span>
                    @endif
                </a>
            </nav>

            <div class="p-4 border-t border-emerald-900 flex md:flex-col gap-2 text-sm">
                <a href="{{ route('home') }}" target="_blank"
                   class="px-4 py-2.5 rounded-lg hover:bg-emerald-900 whitespace-nowrap">View Website</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2.5 rounded-lg hover:bg-emerald-900 text-red-300">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main area --}}
        <div class="flex-1 min-w-0">
            <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
                <p class="text-sm text-stone-500">Signed in as <span class="font-semibold text-stone-800">{{ auth()->user()->name }}</span></p>
                <span class="text-xs bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full font-semibold">Admin</span>
            </header>

            @if (session('success'))
                <div class="max-w-6xl mx-auto mt-4 px-4 w-full">
                    <div class="bg-emerald-100 text-emerald-800 px-4 py-3 rounded-lg">{{ session('success') }}</div>
                </div>
            @endif

            @if (session('error'))
                <div class="max-w-6xl mx-auto mt-4 px-4 w-full">
                    <div class="bg-red-100 text-red-800 px-4 py-3 rounded-lg">{{ session('error') }}</div>
                </div>
            @endif

            <main>
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>