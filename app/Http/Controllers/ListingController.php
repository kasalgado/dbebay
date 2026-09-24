<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingImage;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Listing::query();

        // Join mit Users-Tabelle, um nach Standort zu filtern
        $query->join('users', 'listings.user_id', '=', 'users.id');

        // Filter nach Kategorie
        if ($request->filled('category')) {
            $query->where('category_id', (int) $request->category);
        }

        if ($request->filled('search')) {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('listings.name', 'LIKE', $searchTerm)
                    ->orWhere('listings.beschreibung', 'LIKE', $searchTerm);
            });
        }

        // Filter nach Standort
        if ($request->filled('location')) {
            $query->where('users.ort', $request->location);
        }

        // Suche nach Ort
        if ($request->filled('search_location')) {
            $query->where('users.ort', 'LIKE', '%' . $request->search_location . '%');
        }

        // Filter nach Preisbereich
        if ($request->filled('min_price') && is_numeric($request->min_price)) {
            $query->where('preis', '>=', (float) $request->min_price);
        }
        if ($request->filled('max_price') && is_numeric($request->max_price)) {
            $query->where('preis', '<=', (float) $request->max_price);
        }

        // Preisbereich-Filter
        if ($request->filled('price_range')) {
            if (str_ends_with($request->price_range, '+')) {
                $minPrice = (float) rtrim($request->price_range, '+');
                $query->where('preis', '>=', $minPrice);
            } else {
                // String "20-50" in zwei Werte zerlegen
                $prices = explode('-', $request->price_range);

                if (count($prices) == 2) {
                    $minPrice = (float) $prices[0];
                    $maxPrice = (float) $prices[1];

                    $query->whereBetween('preis', [$minPrice, $maxPrice]);
                }
            }
        }

        $locations = User::select('ort')->distinct()->pluck('ort');
        $listings = $query->orderBy('listings.created_at', 'desc')
            ->select('listings.*')
            ->paginate(15)
            ->appends($request->all());
        $categories = Category::all();

        return view('listings.index', compact('listings', 'categories', 'locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('listings.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'beschreibung' => 'required',
            'preis' => 'required|numeric',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $listing = Listing::create([
            'user_id' => auth()->id(),
            'name' => $validatedData['name'],
            'beschreibung' => $validatedData['beschreibung'],
            'preis' => $validatedData['preis'],
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('listing_images', 'public');
                ListingImage::create([
                    'listing_id' => $listing->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()
            ->route('listings.index')
            ->with('success', 'Artikel erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return view('listings.show', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        $categories = Category::all();

        return view('listings.edit', compact('listing','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $request->validate([
            'name' => 'required',
            'beschreibung' => 'required',
            'preis' => 'required|numeric',
        ]);

        $listing->update($request->only(['name', 'beschreibung', 'preis']));

        return redirect('/listings/' . $listing->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect('/listings');
    }

    public function toggleFavorite($id): RedirectResponse {
        $user = Auth::user();
        $listing = Listing::findOrFail($id);

        if ($user->favorites()->where('listing_id', $id)->exists()) {
            $user->favorites()->detach($listing);
        } else {
            $user->favorites()->attach($listing);
        }

        return redirect()->back();
    }

    public function updateImages(Request $request, Listing $listing)
    {
        $request->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('listing_images', 'public');
                ListingImage::create([
                    'listing_id' => $listing->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Bilder wurden aktualisiert!');
    }

    public function deleteImage($imageId)
    {
        $image = ListingImage::findOrFail($imageId);
        $listing = $image->listing;

        if ($listing->images->count() > 1) {
            Storage::disk('public')->delete($image->image_path); // Bilddatei löschen
            $image->delete(); // Datenbankeintrag löschen
            return redirect()->back()->with('success', 'Bild wurde gelöscht.');
        }

        return redirect()->back()->with('error', 'Mindestens ein Bild muss erhalten bleiben.');
    }
}
