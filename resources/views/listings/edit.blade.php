@extends('layouts.app')
@section('title', 'Anzeige bearbeiten – DBEBay')

@section('content')
<div class="py-12 flex justify-center">
    <div class="w-full max-w-2xl bg-white rounded-3xl border-2 border-teal-500/80 p-8 sm:p-10 shadow-sm">
        <div class="flex items-center gap-3 mb-8">
            <span class="text-2xl text-red-500">✏️</span>
            <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Anzeige bearbeiten</h1>
        </div>
        <div class="mb-8">
            <h2 class="text-base font-bold text-gray-900 mb-4">Bestehende Bilder</h2>
            <div class="grid grid-cols-4 gap-4 items-start">
                @foreach ($listing->images as $image)
                    <div class="flex flex-col items-start gap-2">
                        <div class="w-full aspect-square flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Artikel Bild" class="max-h-full max-w-full object-contain">
                        </div>
                        @if ($listing->images->count() > 1)
                            <form action="{{ route('listings.images.delete', $image->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="w-7 h-7 bg-red-600 hover:bg-red-700 active:bg-red-800 text-white rounded-full flex items-center justify-center transition-colors cursor-pointer shadow-sm"
                                    title="Bild löschen"
                                >
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mb-8">
            <h2 class="text-base font-bold text-gray-900 mb-3">Neue Bilder hinzufügen</h2>
            <form action="{{ route('listings.images.update', $listing->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <input
                        type="file"
                        name="images[]"
                        multiple
                        required
                        class="block text-sm text-gray-600 file:mr-3 file:py-2 file:px-6 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-red-600 file:text-white hover:file:bg-red-700 cursor-pointer"
                    >
                </div>
                <div>
                    <button
                        type="submit"
                        class="px-6 py-2 bg-teal-500 hover:bg-teal-600 active:bg-teal-700 text-white font-medium text-xs sm:text-sm rounded-full shadow transition-colors cursor-pointer"
                    >
                        Bilder hochladen
                    </button>
                </div>
            </form>
        </div>

        <form action="{{ route('listings.update', $listing->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-[130px_1fr] items-center gap-4">
                <label for="name" class="text-base font-bold text-gray-900">Titel:</label>
                <div>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $listing->name) }}"
                        placeholder=""
                        required
                        class="w-48 bg-white border border-gray-200 rounded-full px-4 py-2 text-sm text-gray-800 shadow-[inset_0_2px_4px_rgba(0,0,0,0.1)] focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all"
                    >
                </div>
            </div>
            <div class="grid grid-cols-[130px_1fr] items-center gap-4">
                <label for="category" class="text-base font-bold text-gray-900">Kategorie:</label>
                <div class="relative w-48">
                    <select
                        id="category"
                        name="category"
                        required
                        class="w-full appearance-none bg-white border border-gray-200 rounded-full px-4 py-2 pr-9 text-sm text-gray-800 shadow-[inset_0_2px_4px_rgba(0,0,0,0.1)] focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all cursor-pointer"
                    >
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category', $listing->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3.5 text-gray-600">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-[130px_1fr] items-center gap-4">
                <label for="preis" class="text-base font-bold text-gray-900">Preis:</label>
                <div class="flex items-center gap-2">
                    <input
                        type="number"
                        step="0.01"
                        id="preis"
                        name="preis"
                        value="{{ old('preis', $listing->preis) }}"
                        required
                        class="w-48 bg-white border border-gray-200 rounded-full px-4 py-2 text-sm text-gray-800 shadow-[inset_0_2px_4px_rgba(0,0,0,0.1)] focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all"
                    >
                    <span class="text-base font-medium text-gray-800">€</span>
                </div>
            </div>
            <div class="grid grid-cols-[130px_1fr] items-start gap-4">
                <label for="beschreibung" class="text-base font-bold text-gray-900 pt-2">Beschreibung:</label>
                <textarea
                    id="beschreibung"
                    name="beschreibung"
                    rows="5"
                    required
                    class="w-full bg-white border border-gray-200 rounded-2xl p-4 text-sm font-mono text-gray-800 shadow-[inset_0_2px_4px_rgba(0,0,0,0.1)] focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all resize-y"
                >{{ old('beschreibung', $listing->beschreibung) }}</textarea>
            </div>

            <div class="pt-2">
                <button
                    type="submit"
                    class="px-8 py-2.5 bg-teal-500 hover:bg-teal-600 active:bg-teal-700 text-white font-medium text-sm rounded-full shadow transition-colors cursor-pointer"
                >
                    Änderungen speichern
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
