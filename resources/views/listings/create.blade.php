@extends('layouts.app')
@section('title', 'Angebot erstellen – DBEBay')

@section('content')
    <h1>Neues Listing erstellen</h1>
    <form action="{{ route('listings.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Beschreibung:</label>
        <textarea name="beschreibung" required></textarea>
        <label>Preis:</label>
        <input type="number" step="0.01" name="preis" required>
        <input type="hidden" name="customer_id" value="1">
        <button type="submit">Erstellen</button>
    </form>
    <a href="{{ route('listings.index') }}">Zurück</a>
@endsection
