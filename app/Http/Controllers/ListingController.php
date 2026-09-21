<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::latest()->get();

        return view('listings.index', compact('listings'));
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
}
