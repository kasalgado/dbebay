@extends('layouts.app')
@section('title', 'Anzeige erstellen – DBEBay')

@section('content')
<div class="py-12 flex justify-center">
    <div class="w-full max-w-lg bg-white rounded-3xl border-2 border-teal-500/80 p-8 sm:p-10 shadow-sm">
        <!-- Titel mit Icon -->
        <div class="flex items-center gap-3 mb-8">
            <span class="text-2xl text-red-500">✏️</span>
            <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Anzeige erstellen</h1>
        </div>

        <form action="{{ route('listings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Titel -->
            <div class="grid grid-cols-[110px_1fr] items-center gap-4">
                <label for="name" class="text-base font-bold text-gray-900">Titel:</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder=""
                    required
                    class="w-full bg-white border border-gray-200 rounded-full px-4 py-2 text-sm text-gray-800 shadow-[inset_0_2px_4px_rgba(0,0,0,0.1)] focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all"
                >
            </div>

            <!-- Kategorie -->
            <div class="grid grid-cols-[110px_1fr] items-center gap-4">
                <label for="category" class="text-base font-bold text-gray-900">Kategorie:</label>
                <div class="relative w-full">
                    <select
                        id="category"
                        name="category"
                        required
                        class="w-full appearance-none bg-white border border-gray-200 rounded-full px-4 py-2 pr-9 text-sm text-gray-800 shadow-[inset_0_2px_4px_rgba(0,0,0,0.1)] focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all cursor-pointer"
                    >
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
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

            <!-- Preis -->
            <div class="grid grid-cols-[110px_1fr] items-center gap-4">
                <label for="preis" class="text-base font-bold text-gray-900">Preis:</label>
                <div class="flex items-center gap-2">
                    <input
                        type="number"
                        step="0.01"
                        id="preis"
                        name="preis"
                        value="{{ old('preis') }}"
                        required
                        class="w-full bg-white border border-gray-200 rounded-full px-4 py-2 text-sm text-gray-800 shadow-[inset_0_2px_4px_rgba(0,0,0,0.1)] focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all"
                    >
                    <span class="text-base font-medium text-gray-800">€</span>
                </div>
            </div>

            <!-- Beschreibung -->
            <div class="grid grid-cols-[110px_1fr] items-start gap-4">
                <label for="beschreibung" class="text-base font-bold text-gray-900 pt-2">Beschreibung:</label>
                <textarea
                    id="beschreibung"
                    name="beschreibung"
                    rows="5"
                    required
                    class="w-full bg-white border border-gray-200 rounded-2xl p-4 text-sm font-mono text-gray-800 shadow-[inset_0_2px_4px_rgba(0,0,0,0.1)] focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all resize-y"
                >{{ old('beschreibung') }}</textarea>
            </div>

            <!-- Bilder hochladen (optional) -->
            <div class="grid grid-cols-[110px_1fr] items-center gap-4">
                <label for="images" class="text-base font-bold text-gray-900">Bilder:</label>
                <input
                    type="file"
                    id="images"
                    name="images[]"
                    multiple
                    class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 cursor-pointer"
                >
            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button
                    type="submit"
                    class="px-8 py-2.5 bg-teal-500 hover:bg-teal-600 active:bg-teal-700 text-white font-medium text-sm rounded-full shadow transition-colors cursor-pointer"
                >
                    Speichern
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
