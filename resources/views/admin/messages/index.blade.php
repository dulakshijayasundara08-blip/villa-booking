@extends('layouts.admin')

@section('title', 'Messages')

@section('content')

    <section class="max-w-6xl mx-auto px-4 py-10">
        <div class="mb-8">
            <h1 class="font-display text-3xl font-bold">Contact Messages</h1>
            <p class="text-stone-500 text-sm mt-1">
                {{ $messages->count() }} {{ \Illuminate\Support\Str::plural('message', $messages->count()) }} in total
                &middot; {{ $messages->where('is_read', false)->count() }} unread
            </p>
        </div>

        <div class="space-y-4">
            @forelse ($messages as $message)
                <div class="bg-white rounded-2xl shadow p-6 {{ $message->is_read ? '' : 'border-l-4 border-red-500' }}">
                    <div class="flex flex-wrap items-start justify-between gap-3">
                        <div>
                            <div class="flex items-center gap-3">
                                <p class="font-semibold text-lg">{{ $message->name }}</p>
                                @unless ($message->is_read)
                                    <span class="text-xs bg-red-100 text-red-700 font-semibold px-2 py-0.5 rounded-full">New</span>
                                @endunless
                            </div>
                            <a href="mailto:{{ $message->email }}" class="text-sm text-emerald-700 hover:underline">
                                {{ $message->email }}
                            </a>
                        </div>
                        <p class="text-xs text-stone-400 whitespace-nowrap">
                            {{ $message->created_at->format('M d, Y \a\t h:i A') }}
                        </p>
                    </div>

                    @if ($message->subject)
                        <p class="font-medium mt-4">{{ $message->subject }}</p>
                    @endif

                    <p class="text-stone-600 text-sm mt-2 whitespace-pre-line">{{ $message->message }}</p>

                    <div class="flex flex-wrap items-center gap-3 mt-5 pt-4 border-t">
                        <a href="mailto:{{ $message->email }}"
                           class="bg-emerald-700 text-white text-xs font-semibold px-4 py-2 rounded-full hover:bg-emerald-800">
                            Reply by Email
                        </a>

                        @unless ($message->is_read)
                            <form method="POST" action="{{ route('admin.messages.read', $message) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                        class="border border-emerald-600 text-emerald-700 text-xs font-semibold px-4 py-2 rounded-full hover:bg-emerald-50">
                                    Mark as Read
                                </button>
                            </form>
                        @endunless

                        <form method="POST" action="{{ route('admin.messages.destroy', $message) }}"
                              onsubmit="return confirm('Delete this message?');" class="ml-auto">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 text-xs font-semibold hover:underline">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-2xl shadow p-10 text-center text-stone-500">
                    No messages yet. Messages from the Contact page will appear here.
                </div>
            @endforelse
        </div>
    </section>

@endsection