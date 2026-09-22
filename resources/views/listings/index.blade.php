@extends('layouts.app')
@section('title', 'Liste der Angebote – DBEBay')

@section('content')
<div class="py-6">
    <div class="flex flex-col md:flex-row gap-8 items-start">
        <!-- Left Column: Filter Sidebar -->
        <aside class="w-full md:w-64 lg:w-72 shrink-0">
            <x-filter-sidebar :categories="$categories" :locations="$locations" />
        </aside>

        <!-- Right Column: Listings -->
        <section class="flex-1 min-w-0 w-full">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-6 mb-6 border-b border-gray-200">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Alle Angebote</h1>
                    <p class="text-sm text-gray-500 mt-1">
                        {{ $listings->count() }} {{ $listings->count() === 1 ? 'Angebot gefunden' : 'Angebote gefunden' }}
                    </p>
                </div>
                <a href="{{ route('listings.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-teal-600 hover:bg-teal-700 text-white text-sm font-medium rounded-lg shadow-sm transition duration-150">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Neues Angebot erstellen
                </a>
            </div>

            @if ($listings->isEmpty())
                <div class="bg-white rounded-xl border border-gray-200 p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <h3 class="mt-2 text-base font-semibold text-gray-900">Keine Angebote gefunden</h3>
                    <p class="mt-1 text-sm text-gray-500">Versuche andere Filterkriterien oder erstelle ein neues Angebot.</p>
                    <div class="mt-6">
                        <a href="{{ route('listings.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50">
                            Alle Filter zurücksetzen
                        </a>
                    </div>
                </div>
            @else
                <div class="product-grid flex flex-wrap gap-6">
                    @foreach ($listings as $listing)
                        <div class="flex flex-col">
                            <x-listing-card :listing="$listing" />
                            <div class="flex items-center gap-3 px-1 mt-1 mb-4 text-sm">
                                <a href="{{ route('listings.edit', $listing->id) }}" class="text-teal-600 hover:text-teal-800 font-medium">Bearbeiten</a>
                                <form action="{{ route('listings.destroy', $listing->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium cursor-pointer">Löschen</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $listings->links() }}
            @endif
        </section>
    </div>
</div>
@endsection
