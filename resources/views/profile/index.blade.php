@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-2">Profil-Infos</h2>
    <form method="POST" action="{{ route('profile.update') }}">
        @method('PUT')
        @csrf
        <div class="text-1xl font-semibold">Benutzername:</div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
            <input type="text" name="name" value="{{ auth()->user()->name }}" required>
        </div>
        <div class="text-1xl font-semibold">E-Mail:</div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
            <input type="email" name="email" value="{{ auth()->user()->email }}" required>
        </div>
        <div class="text-1xl font-semibold">PLZ:</div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
            <input type="text" name="plz" value="{{ auth()->user()->plz }}" required>
        </div>
        <div class="text-1xl font-semibold">Ort:</div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
            <input type="text" name="ort" value="{{ auth()->user()->ort }}" required>
        </div>
        <div class="text-1xl font-semibold">Straße:</div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
            <input type="text" name="strasse" value="{{ auth()->user()->strasse }}" required>
        </div>
        <div class="text-1xl font-semibold">Hausnummer:</div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
            <input type="text" name="hausnummer" value="{{ auth()->user()->hausnummer }}" required>
        </div>
        <div class="text-1xl font-semibold">Telefonnummer:</div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
            <input type="text" name="telefonnummer" value="{{ auth()->user()->telefonnummer }}" required>
        </div>
        <button type="submit">Speichern</button>
    </form>
    <h2>Meine Anzeigen</h2>
    <div class="product-grid">
        @if (auth()->user()->listings->count() > 0)
            @foreach (auth()->user()->listings as $listing)
                <div>
                    <x-listing-card :listing="$listing" />
                    <a href="{{ route('listings.edit', $listing->id) }}">Bearbeiten</a>
                    <form action="{{ route('listings.destroy', $listing->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-sm text-orange-400 text-center" type="submit">Löschen</button>
                    </form>
                </div>
            @endforeach
        @else
            Du hast keine Anzeigen geschaltet.
        @endif
    </div>

    <h2>Meine Favoriten</h2>
    <div class="favorites">
        @if (auth()->user()->favorites->count() > 0)
            @foreach (auth()->user()->favorites as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        @else
            Du hast keine Favoriten festgelegt.
        @endif
    </div>
@endsection
