@extends('layouts.app')
@section('title', 'Angebot erstellen – DBEBay')

@section('content')
    <h1 class="text-2xl font-semibold mb-10">Neues Listing erstellen</h1>
    <form action="{{ route('listings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-[1fr_2fr] gap-4 mb-2">
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <div class="grid grid-cols-[1fr_2fr] gap-4 mb-2">
            <label>Kategorie:</label>
            <select name="category">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="grid grid-cols-[1fr_2fr] gap-4 mb-2">
            <label>Preis:</label>
            <input type="number" step="0.01" name="preis" required>
        </div>
        <div class="grid grid-cols-[1fr_2fr] gap-4 mb-2">
            <label>Beschreibung:</label>
            <textarea name="beschreibung" required></textarea>
        </div>
        <div class="grid grid-cols-[1fr_2fr] gap-4 mb-2">
            <label>Bilder hochladen:</label>
            <input type="file" name="images[]" multiple>
        </div>
        <button class="border-2 border-green-600 rounded-full px-10 py-1 bg-green-500 mb-2" type="submit">
            Speichern
        </button>
    </form>
    <a href="{{ route('listings.index') }}">Zurück</a>
@endsection
