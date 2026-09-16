@extends('layouts.app')
@section('title', 'Liste der Angebote – DBEBay')

@section('content')
    <h1>Alle Angebote</h1>
    <a href="{{ route('listings.create') }}">Neues Angebot erstellen</a>

    <div class="product-grid">
        @foreach ($listings as $listing)
            <div>
                <x-listing-card :listing="$listing" />
                <a href="{{ route('listings.edit', $listing->id) }}">Bearbeiten</a>
                <form action="{{ route('listings.destroy', $listing->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Löschen</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
