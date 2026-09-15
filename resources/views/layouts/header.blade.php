@vite(['resources/css/header.css'])

<header class="site-header">
    <div class="header-inner">
        <a href="#" class="logo">
            <img src="{{ asset('img/logo.svg') }}" alt="DBEbay">
        </a>
        <div class="search-bar">
            <div class="search-input">
                <img src="{{ asset('img/lupe.svg') }}" alt="" class="search-icon">
                <input type="text" placeholder="Was suchst du?">
            </div>

            <div class="location-input">
                <img src="{{ asset('img/location.svg') }}" alt="" class="location-icon">
                <input type="text" placeholder="PLZ oder Ort">
            </div>

            <button type="button" class="search-button">
                Suchen
            </button>
        </div>
        <nav class="header-actions" aria-label="Benutzermenü">
            <a href="#" aria-label="Profil">
                <img src="{{ asset('img/profile.svg') }}" alt="">
            </a>

            <a href="#" aria-label="Meine Anzeigen">
                <img src="{{ asset('img/create_listing.svg') }}" alt="">
            </a>

            <a href="#" aria-label="Favoriten">
                <img src="{{ asset('img/heart.svg') }}" alt="">
            </a>
        </nav>
    </div>
</header>
