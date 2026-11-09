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

<div>
    <label for="name" class="block text-sm font-medium text-stone-700 mb-1">Room name</label>
    <input id="name" type="text" name="name" value="{{ old('name', $room->name ?? '') }}"
           placeholder="Garden View Room"
           class="w-full border border-stone-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
</div>

<div>
    <label for="description" class="block text-sm font-medium text-stone-700 mb-1">Description</label>
    <textarea id="description" name="description" rows="4"
              class="w-full border border-stone-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">{{ old('description', $room->description ?? '') }}</textarea>
</div>

<div class="grid gap-5 sm:grid-cols-2">
    <div>
        <label for="price_per_night" class="block text-sm font-medium text-stone-700 mb-1">Price per night (Rs.)</label>
        <input id="price_per_night" type="number" step="0.01" min="0" name="price_per_night"
               value="{{ old('price_per_night', $room->price_per_night ?? '') }}"
               class="w-full border border-stone-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
    </div>
    <div>
        <label for="capacity" class="block text-sm font-medium text-stone-700 mb-1">Max guests</label>
        <input id="capacity" type="number" min="1" max="20" name="capacity"
               value="{{ old('capacity', $room->capacity ?? '') }}"
               class="w-full border border-stone-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
    </div>
</div>

<div>
    <label for="image" class="block text-sm font-medium text-stone-700 mb-1">
        Image path <span class="text-stone-400 font-normal">(optional)</span>
    </label>
    <input id="image" type="text" name="image" value="{{ old('image', $room->image ?? '') }}"
           placeholder="images/room-1.jpg"
           class="w-full border border-stone-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
    <p class="text-xs text-stone-500 mt-1">Put the photo inside <code>public/images</code> and write its path here.</p>
</div>

<div class="flex items-center gap-4 pt-2">
    <button type="submit"
            class="bg-emerald-700 text-white font-semibold px-8 py-3 rounded-full hover:bg-emerald-800 transition">
        {{ $button ?? 'Save' }}
    </button>
    <a href="{{ route('admin.rooms.index') }}" class="text-stone-600 hover:underline text-sm">Cancel</a>
</div>