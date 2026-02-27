<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    use \App\Traits\UploadsImage;

    public function index()
    {
        $offers = \App\Models\Offer::latest()->paginate(10);
        return view('admin.offers.index', compact('offers'));
    }

    public function create()
    {
        return view('admin.offers.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'discount_code' => 'nullable|string|max:50',
            'valid_until' => 'nullable|date',
            'image_upload' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image_upload')) {
            $validated['image_url'] = $this->uploadImage($request->file('image_upload'));
        }
        unset($validated['image_upload']);

        \App\Models\Offer::create($validated);

        return redirect()->route('admin.offers.index')->with('success', 'Offer created successfully.');
    }

    public function edit(\App\Models\Offer $offer)
    {
        return view('admin.offers.form', compact('offer'));
    }

    public function update(Request $request, \App\Models\Offer $offer)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'discount_code' => 'nullable|string|max:50',
            'valid_until' => 'nullable|date',
            'image_upload' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image_upload')) {
            $validated['image_url'] = $this->uploadImage($request->file('image_upload'), 'images', $offer->image_url);
        }
        unset($validated['image_upload']);

        $offer->update($validated);

        return redirect()->route('admin.offers.index')->with('success', 'Offer updated successfully.');
    }

    public function destroy(\App\Models\Offer $offer)
    {
        $offer->delete();
        return redirect()->route('admin.offers.index')->with('success', 'Offer deleted successfully.');
    }
}
