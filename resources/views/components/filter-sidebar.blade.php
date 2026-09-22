<div class="filter-sidebar bg-white rounded-xl shadow-sm border border-gray-200 p-5">
    <div class="flex items-center justify-between pb-4 mb-4 border-b border-gray-100">
        <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
            <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
            </svg>
            Filter
        </h2>
        @if(request()->hasAny(['category', 'location', 'price_range', 'min_price', 'max_price']))
            <a href="{{ route('listings.index') }}" class="text-xs font-medium text-teal-600 hover:text-teal-800 hover:underline">
                Zurücksetzen
            </a>
        @endif
    </div>

    <form action="{{ route('listings.index') }}" method="GET" class="space-y-6">

        <!-- Kategorien -->
        <div>
            <h3 class="text-sm font-semibold text-gray-800 uppercase tracking-wider mb-3">Kategorien</h3>
            <div class="space-y-2 max-h-48 overflow-y-auto pr-1">
                <label class="flex items-center gap-2.5 text-sm text-gray-700 hover:text-teal-700 cursor-pointer transition">
                    <input type="radio" name="category" value=""
                        {{ !request('category') ? 'checked' : '' }}
                        class="w-4 h-4 text-teal-600 border-gray-300 focus:ring-teal-500">
                    <span>Alle Kategorien</span>
                </label>
                @foreach ($categories as $category)
                    <label class="flex items-center gap-2.5 text-sm text-gray-700 hover:text-teal-700 cursor-pointer transition">
                        <input type="radio" name="category" value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'checked' : '' }}
                            class="w-4 h-4 text-teal-600 border-gray-300 focus:ring-teal-500">
                        <span>{{ $category->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="border-t border-gray-100 pt-5">
            <!-- Standort -->
            <h3 class="text-sm font-semibold text-gray-800 uppercase tracking-wider mb-3">Orte</h3>
            <div class="space-y-2 max-h-48 overflow-y-auto pr-1">
                <label class="flex items-center gap-2.5 text-sm text-gray-700 hover:text-teal-700 cursor-pointer transition">
                    <input type="radio" name="location" value=""
                        {{ !request('location') ? 'checked' : '' }}
                        class="w-4 h-4 text-teal-600 border-gray-300 focus:ring-teal-500">
                    <span>Alle Orte</span>
                </label>
                @foreach ($locations as $location)
                    @if(!empty($location))
                        <label class="flex items-center gap-2.5 text-sm text-gray-700 hover:text-teal-700 cursor-pointer transition">
                            <input type="radio" name="location" value="{{ $location }}"
                                {{ request('location') == $location ? 'checked' : '' }}
                                class="w-4 h-4 text-teal-600 border-gray-300 focus:ring-teal-500">
                            <span>{{ $location }}</span>
                        </label>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="border-t border-gray-100 pt-5">
            <!-- Preisbereich -->
            <h3 class="text-sm font-semibold text-gray-800 uppercase tracking-wider mb-3">Preise</h3>
            <div class="space-y-2">
                <label class="flex items-center gap-2.5 text-sm text-gray-700 hover:text-teal-700 cursor-pointer transition">
                    <input type="radio" name="price_range" value=""
                        {{ !request('price_range') ? 'checked' : '' }}
                        class="w-4 h-4 text-teal-600 border-gray-300 focus:ring-teal-500">
                    <span>Alle Preise</span>
                </label>
                <label class="flex items-center gap-2.5 text-sm text-gray-700 hover:text-teal-700 cursor-pointer transition">
                    <input type="radio" name="price_range" value="0-20"
                        {{ request('price_range') == '0-20' ? 'checked' : '' }}
                        class="w-4 h-4 text-teal-600 border-gray-300 focus:ring-teal-500">
                    <span>0€ - 20€</span>
                </label>
                <label class="flex items-center gap-2.5 text-sm text-gray-700 hover:text-teal-700 cursor-pointer transition">
                    <input type="radio" name="price_range" value="20-50"
                        {{ request('price_range') == '20-50' ? 'checked' : '' }}
                        class="w-4 h-4 text-teal-600 border-gray-300 focus:ring-teal-500">
                    <span>20€ - 50€</span>
                </label>
                <label class="flex items-center gap-2.5 text-sm text-gray-700 hover:text-teal-700 cursor-pointer transition">
                    <input type="radio" name="price_range" value="50-200"
                        {{ request('price_range') == '50-200' ? 'checked' : '' }}
                        class="w-4 h-4 text-teal-600 border-gray-300 focus:ring-teal-500">
                    <span>50€ - 200€</span>
                </label>
                <label class="flex items-center gap-2.5 text-sm text-gray-700 hover:text-teal-700 cursor-pointer transition">
                    <input type="radio" name="price_range" value="200+"
                        {{ request('price_range') == '200+' ? 'checked' : '' }}
                        class="w-4 h-4 text-teal-600 border-gray-300 focus:ring-teal-500">
                    <span>200€+</span>
                </label>
            </div>

            <!-- Min-Max Eingabe -->
            <div class="mt-3 pt-3 border-t border-dashed border-gray-200">
                <span class="block text-xs font-medium text-gray-500 mb-2">Eigener Preisbereich (€):</span>
                <div class="grid grid-cols-2 gap-2">
                    <input type="number" step="any" min="0" name="min_price" placeholder="Min" value="{{ request('min_price') }}"
                        class="w-full text-sm rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 px-2.5 py-1.5">
                    <input type="number" step="any" min="0" name="max_price" placeholder="Max" value="{{ request('max_price') }}"
                        class="w-full text-sm rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 px-2.5 py-1.5">
                </div>
            </div>
        </div>

        <!-- Filter-Button -->
        <div class="pt-2">
            <button type="submit"
                class="w-full inline-flex justify-center items-center gap-2 bg-teal-600 hover:bg-teal-700 active:bg-teal-800 text-white font-medium py-2.5 px-4 rounded-lg shadow-sm transition duration-150 ease-in-out text-sm cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                </svg>
                Filtern
            </button>
        </div>
    </form>
</div>
