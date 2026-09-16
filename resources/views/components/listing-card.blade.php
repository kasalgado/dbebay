@vite(['resources/css/card.css'])

<div class="product-card">
    <div class="product-image-placeholder">
        <img
            src="{{ asset('storage/listing_images/'.$listing->name) }}"
            alt="{{ $listing->name }}"
        />
    </div>
    <div class="product-info">
        <h3 class="product-name">
            <a href="{{ route('listings.show', $listing->id) }}">{{ $listing->name }}</a>
        </h3>
        <div class="product-details">
            <span class="product-location">📍 Berlin</span>
            <span>{{ number_format($listing->preis, 2) }}€</span>
        </div>
    </div>
</div>
