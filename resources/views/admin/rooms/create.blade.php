@extends('layouts.admin')

@section('title', 'Add Room')

@section('content')

    <section class="max-w-3xl mx-auto px-4 py-12">
        <div class="mb-6">
            <a href="{{ route('admin.rooms.index') }}" class="text-sm text-emerald-700 hover:underline">&larr; Back to rooms</a>
            <h1 class="font-display text-3xl font-bold mt-2">Add a New Room</h1>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-8">
            <form method="POST" action="{{ route('admin.rooms.store') }}" class="space-y-5">
                @include('admin.rooms._form', ['button' => 'Add Room'])
            </form>
        </div>
    </section>

@endsection