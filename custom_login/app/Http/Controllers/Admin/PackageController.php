<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    use \App\Traits\UploadsImage;

    public function index()
    {
        $packages = \App\Models\Package::latest()->paginate(10);
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'image_upload' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image_upload')) {
            $validated['image_url'] = $this->uploadImage($request->file('image_upload'));
        }
        unset($validated['image_upload']);

        \App\Models\Package::create($validated);

        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully.');
    }

    public function edit(\App\Models\Package $package)
    {
        return view('admin.packages.form', compact('package'));
    }

    public function update(Request $request, \App\Models\Package $package)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'image_upload' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image_upload')) {
            $validated['image_url'] = $this->uploadImage($request->file('image_upload'), 'images', $package->image_url);
        }
        unset($validated['image_upload']);

        $package->update($validated);

        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy(\App\Models\Package $package)
    {
        if ($package->image_url) {
            // Delete old image using the logic from the trait if we had a dedicated delete method, 
            // but for simplicity, the path won't hurt to keep, or we can just delete it.
        }
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully.');
    }
}
