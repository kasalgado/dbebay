@extends('layouts.app')
@section('title', 'Mein Profil – DBEBay')

@section('content')
<div class="py-10 max-w-4xl mx-auto space-y-10">
    <!-- Profil-Infos bearbeiten -->
    <div class="flex justify-center">
        <div class="w-full max-w-lg bg-white rounded-3xl border-2 border-teal-500/80 p-8 sm:p-10 shadow-sm">
            <!-- Titel mit Icon -->
            <div class="flex items-center gap-3 mb-8">
                <span class="text-2xl text-red-500">✏️</span>
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Profil bearbeiten</h1>
            </div>

            <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                @csrf

                <!-- Benutzername -->
                <div class="grid grid-cols-[130px_1fr] items-center gap-4">
                    <label for="name" class="text-base font-bold text-gray-900">Benutzername:</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', auth()->user()->name) }}"
                        required
                        class="w-full bg-white border border-gray-200 rounded-full px-4 py-2 text-sm text-gray-800 shadow-[inset_0_2px_4px_rgba(0,0,0,0.1)] focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all"
                    >
                </div>

                <!-- E-Mail -->
                <div class="grid grid-cols-[130px_1fr] items-center gap-4">
                    <label for="email" class="text-base font-bold text-gray-900">E-Mail:</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', auth()->user()->email) }}"
                        required
                        class="w-full bg-white border border-gray-200 rounded-full px-4 py-2 text-sm text-gray-800 shadow-[inset_0_2px_4px_rgba(0,0,0,0.1)] focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all"
                    >
                </div>

                <!-- Straße -->
                <div class="grid grid-cols-[130px_1fr] items-center gap-4">
                    <label for="strasse" class="text-base font-bold text-gray-900">Straße:</label>
                    <input
                        type="text"
                        id="strasse"
                        name="strasse"
                        value="{{ old('strasse', auth()->user()->strasse) }}"
                        required
                        class="w-full bg-white border border-gray-200 rounded-full px-4 py-2 text-sm text-gray-800 shadow-[inset_0_2px_4px_rgba(0,0,0,0.1)] focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all"
                    >
                </div>

                <!-- Hausnummer -->
                <div class="grid grid-cols-[130px_1fr] items-center gap-4">
                    <label for="hausnummer" class="text-base font-bold text-gray-900">Hausnummer:</label>
                    <input
                        type="text"
                        id="hausnummer"
                        name="hausnummer"
                        value="{{ old('hausnummer', auth()->user()->hausnummer) }}"
                        required
                        class="w-full bg-white border border-gray-200 rounded-full px-4 py-2 text-sm text-gray-800 shadow-[inset_0_2px_4px_rgba(0,0,0,0.1)] focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all"
                    >
                </div>

                <!-- PLZ -->
                <div class="grid grid-cols-[130px_1fr] items-center gap-4">
                    <label for="plz" class="text-base font-bold text-gray-900">PLZ:</label>
                    <input
                        type="text"
                        id="plz"
                        name="plz"
                        value="{{ old('plz', auth()->user()->plz) }}"
                        required
                        class="w-full bg-white border border-gray-200 rounded-full px-4 py-2 text-sm text-gray-800 shadow-[inset_0_2px_4px_rgba(0,0,0,0.1)] focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all"
                    >
                </div>

                <!-- Ort -->
                <div class="grid grid-cols-[130px_1fr] items-center gap-4">
                    <label for="ort" class="text-base font-bold text-gray-900">Ort:</label>
                    <input
                        type="text"
                        id="ort"
                        name="ort"
                        value="{{ old('ort', auth()->user()->ort) }}"
                        required
                        class="w-full bg-white border border-gray-200 rounded-full px-4 py-2 text-sm text-gray-800 shadow-[inset_0_2px_4px_rgba(0,0,0,0.1)] focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all"
                    >
                </div>

                <!-- Telefonnummer -->
                <div class="grid grid-cols-[130px_1fr] items-center gap-4">
                    <label for="telefonnummer" class="text-base font-bold text-gray-900">Telefonnummer:</label>
                    <input
                        type="text"
                        id="telefonnummer"
                        name="telefonnummer"
                        value="{{ old('telefonnummer', auth()->user()->telefonnummer) }}"
                        required
                        class="w-full bg-white border border-gray-200 rounded-full px-4 py-2 text-sm text-gray-800 shadow-[inset_0_2px_4px_rgba(0,0,0,0.1)] focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all"
                    >
                </div>

                <!-- Submit Button -->
                <div class="pt-2 flex items-center justify-between">
                    <button
                        type="submit"
                        class="px-8 py-2.5 bg-teal-500 hover:bg-teal-600 active:bg-teal-700 text-white font-medium text-sm rounded-full shadow transition-colors cursor-pointer"
                    >
                        Änderung speichern
                    </button>
                    <a
                        href="{{ route('listings.index') }}"
                        class="text-sm font-medium text-gray-500 hover:text-gray-800 transition-colors"
                    >
                        Zurück
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Meine Anzeigen -->
    <div class="bg-white rounded-3xl border-2 border-teal-500/80 p-8 sm:p-10 shadow-sm">
        <div class="flex items-center gap-3 mb-6">
            <span class="text-2xl">📦</span>
            <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Meine Anzeigen</h2>
        </div>
        @if (auth()->user()->listings->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach (auth()->user()->listings as $listing)
                    <div class="flex flex-col bg-gray-50 rounded-2xl p-4 border border-gray-200">
                        <x-listing-card :listing="$listing" />
                        <div class="mt-3 flex items-center justify-between pt-2 border-t border-gray-200">
                            <a href="{{ route('listings.edit', $listing->id) }}" class="text-sm font-medium text-teal-600 hover:text-teal-700">Bearbeiten</a>
                            <form action="{{ route('listings.destroy', $listing->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-sm font-medium text-red-500 hover:text-red-700 cursor-pointer" type="submit">Löschen</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">Du hast keine Anzeigen geschaltet.</p>
        @endif
    </div>

    <!-- Meine Favoriten -->
    <div class="bg-white rounded-3xl border-2 border-teal-500/80 p-8 sm:p-10 shadow-sm">
        <div class="flex items-center gap-3 mb-6">
            <span class="text-2xl text-red-500">❤️</span>
            <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Meine Favoriten</h2>
        </div>
        @if (auth()->user()->favorites->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach (auth()->user()->favorites as $listing)
                    <div class="flex flex-col bg-gray-50 rounded-2xl p-4 border border-gray-200">
                        <x-listing-card :listing="$listing" />
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">Du hast keine Favoriten festgelegt.</p>
        @endif
    </div>
</div>
@endsection
