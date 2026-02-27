<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Traits\UploadsImage;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    use UploadsImage;

    public function index()
    {
        $hotels = Hotel::paginate(10);
        return view('admin.hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('admin.hotels.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'price' => 'required|numeric|min:0',
            'image_upload' => 'nullable|image|max:2048', // Allow single image upload for simplicity
        ]);

        // Handle image
        $images = [];
        if ($request->hasFile('image_upload')) {
            $path = $this->uploadImage($request->file('image_upload'));
            if ($path) {
                $images[] = $path;
            }
        }
        $validated['images'] = $images;
        unset($validated['image_upload']);

        Hotel::create($validated);

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel created successfully.');
    }

    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.form', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'price' => 'required|numeric|min:0',
            'image_upload' => 'nullable|image|max:2048',
        ]);

        $images = is_array($hotel->images) ? $hotel->images : [];
        if ($request->hasFile('image_upload')) {
            $path = $this->uploadImage($request->file('image_upload'));
            if ($path) {
                $images = [$path]; // Replace existing images array with new one for simplicity
            }
        }
        $validated['images'] = $images;
        unset($validated['image_upload']);

        $hotel->update($validated);

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel updated successfully.');
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('admin.hotels.index')->with('success', 'Hotel deleted successfully.');
    }
}
