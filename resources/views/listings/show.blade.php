@extends('layouts.app')
@section('title', 'Angebot – DBEBay')
@vite(['resources/css/listing_show.css'])

@section('content')
    <div class="listing-page">
        <div class="listing-container">
            <section class="product-section">
                <div class="product-gallery">
                    <div class="thumbnail-list">
                        @foreach($listing->images as $image)
                            <button class="thumbnail active">
                                <img
                                    src="{{ asset('storage/listing_images/'.$image->image_path) }}"
                                    alt="{{ $image->name }}"
                                />
                            </button>
                        @endforeach
                    </div>
                    <div class="main-image">
                        <img
                            src="{{ asset('storage/'.$listing->images[0]->image_path) }}"
                            alt="{{ $listing->name }}"
                        />
                    </div>
                </div>
                <aside class="seller-card">
                    <div class="seller-title">
                        <span class="seller-icon">
                            <img src="{{ asset('img/profile.svg') }}" alt="" />
                        </span>
                        <strong>Angeboten von:</strong>
                    </div>
                    <div class="seller-name">Max Mustermann</div>
                    <div class="seller-info">
                        <div class="seller-info-header">
                            <span class="seller-icon">
                                <img src="{{ asset('img/location.svg') }}" alt="" />
                            </span>
                            <strong>Adresse:</strong>
                        </div>
                        <p>
                            Musterstraße 10,<br>
                            12345 Berlin<br>
                            max@example.com
                        </p>
                    </div>
                    <div class="price">
                        <div class="price-header">
                            <span class="seller-icon">
                                <img src="{{ asset('img/euro.svg') }}" alt="" />
                            </span>
                            <strong>Preis:</strong>
                        </div>
                        <span>{{ number_format($listing->preis, 2) }}€</span>
                    </div>
                    <button class="favorite-button" type="button">
                        <span>♡</span>
                        <form action="{{ route('listings.favorite', $listing->id) }}" method="POST">
                            @csrf
                            <button type="submit">
                                @if(auth()->user() && auth()->user()->favorites->contains($listing->id))
                                    <img src="{{ asset('img/heart-filled.svg') }}" alt=""> Aus Favoriten entfernen
                                @else
                                    <img src="{{ asset('img/heart.svg') }}" alt=""> Zu Favoriten hinzufügen
                                @endif
                            </button>
                        </form>
                    </button>
                </aside>
            </section>

            <section class="listing-details">
                <h1>{{ $listing->name }}</h1>
                <div class="listing-meta">
                    <div class="meta-item">
                        <span class="meta-icon">
                            <img src="{{ asset('img/calender.svg') }}" alt="" />
                        </span>
                        <span>05.03.2025</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-icon">
                            <img src="{{ asset('img/people.svg') }}" alt="" />
                        </span>
                        <span>1 Person/en interessiert</span>
                    </div>
                </div>
                <div class="description">
                    <p>{{ $listing->beschreibung }}</p>
                </div>
            </section>
        </div>
    </div>
    <a href="{{ route('listings.index') }}">Zurück zur Übersicht</a>
@endsection
