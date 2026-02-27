<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use \App\Traits\UploadsImage;

    public function index()
    {
        $newsItems = \App\Models\News::latest()->paginate(10);
        return view('admin.news.index', compact('newsItems'));
    }

    public function create()
    {
        return view('admin.news.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'published_at' => 'nullable|date',
            'image_upload' => 'nullable|image|max:2048',
            'is_published' => 'boolean',
        ]);

        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('image_upload')) {
            $validated['image_url'] = $this->uploadImage($request->file('image_upload'));
        }
        unset($validated['image_upload']);

        \App\Models\News::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'News item created successfully.');
    }

    public function edit(\App\Models\News $news)
    {
        return view('admin.news.form', compact('news'));
    }

    public function update(Request $request, \App\Models\News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'published_at' => 'nullable|date',
            'image_upload' => 'nullable|image|max:2048',
            'is_published' => 'boolean',
        ]);

        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('image_upload')) {
            $validated['image_url'] = $this->uploadImage($request->file('image_upload'), 'images', $news->image_url);
        }
        unset($validated['image_upload']);

        $news->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'News item updated successfully.');
    }

    public function destroy(\App\Models\News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'News item deleted successfully.');
    }
}
