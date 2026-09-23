<header class="w-full bg-white border-b-4 border-teal-500 shadow-sm">
    <div class="w-[90%] max-w-[1200px] mx-auto h-20 flex items-center justify-between gap-4 md:gap-8">
        <a href="{{ url('/dashboard') }}" class="flex items-center shrink-0 hover:opacity-90 transition-opacity">
            <img src="{{ asset('img/logo.svg') }}" alt="DBEbay" class="h-10 w-auto">
        </a>

        <form action="{{ route('listings.index') }}" method="GET" id="search" class="flex-1 max-w-2xl flex items-center bg-white border border-gray-300 rounded-full shadow-sm hover:border-gray-400 focus-within:border-teal-500 focus-within:ring-2 focus-within:ring-teal-500/20 transition-all p-1.5">
            <!-- Search Keyword -->
            <div class="flex items-center flex-1 min-w-0 pl-3 pr-2">
                <img src="{{ asset('img/lupe.svg') }}" alt="Suchlupe" class="w-4 h-4 shrink-0 opacity-60 mr-2">
                <input
                    type="text"
                    name="search"
                    placeholder="Was suchst du?"
                    value="{{ request('search') }}"
                    class="w-full bg-transparent text-sm text-gray-800 placeholder-gray-400 focus:outline-none border-none focus:ring-0 p-0"
                >
            </div>

            <!-- Divider -->
            <div class="h-5 w-px bg-gray-300 shrink-0 mx-1"></div>

            <!-- Search Location -->
            <div class="flex items-center flex-1 min-w-0 pl-2 pr-2">
                <img src="{{ asset('img/location.svg') }}" alt="Ort" class="w-4 h-4 shrink-0 opacity-60 mr-2">
                <input
                    type="text"
                    name="search_location"
                    placeholder="PLZ oder Ort"
                    value="{{ request('search_location') }}"
                    class="w-full bg-transparent text-sm text-gray-800 placeholder-gray-400 focus:outline-none border-none focus:ring-0 p-0"
                >
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="shrink-0 px-5 py-2 bg-teal-600 hover:bg-teal-700 active:bg-teal-800 text-white text-sm font-semibold rounded-full shadow-sm transition-colors duration-150 flex items-center gap-1.5 cursor-pointer focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-1"
            >
                Suchen
            </button>
        </form>

        <nav class="flex items-center gap-3 shrink-0" aria-label="Benutzermenü">
            @auth
                <a href="{{ url('/profil') }}" aria-label="Profil" class="p-2 text-gray-600 hover:text-teal-600 hover:bg-gray-100 rounded-full transition-colors" title="Profil">
                    <img src="{{ asset('img/profile.svg') }}" alt="" class="w-5 h-5">
                </a>
            @else
                <a href="{{ url('/login') }}" aria-label="Login" class="p-2 text-gray-600 hover:text-teal-600 hover:bg-gray-100 rounded-full transition-colors" title="Login">
                    <img src="{{ asset('img/profile.svg') }}" alt="" class="w-5 h-5">
                </a>
            @endauth

            <a href="{{ url('/listings/create') }}" aria-label="Meine Anzeigen" class="p-2 text-gray-600 hover:text-teal-600 hover:bg-gray-100 rounded-full transition-colors" title="Meine Anzeigen">
                <img src="{{ asset('img/create_listing.svg') }}" alt="" class="w-5 h-5">
            </a>

            <a href="{{ route('listings.index') }}" aria-label="Favoriten" class="p-2 text-gray-600 hover:text-teal-600 hover:bg-gray-100 rounded-full transition-colors" title="Favoriten">
                <img src="{{ asset('img/heart.svg') }}" alt="" class="w-5 h-5">
            </a>
        </nav>
    </div>
</header>
