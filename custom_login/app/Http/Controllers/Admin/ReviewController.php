<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = \App\Models\Review::latest()->paginate(10);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('admin.reviews.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reviewer' => 'required|string|max:255',
            'review_for' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        \App\Models\Review::create($validated);

        return redirect()->route('admin.reviews.index')->with('success', 'Review created successfully.');
    }

    public function edit(\App\Models\Review $review)
    {
        return view('admin.reviews.form', compact('review'));
    }

    public function update(Request $request, \App\Models\Review $review)
    {
        $validated = $request->validate([
            'reviewer' => 'required|string|max:255',
            'review_for' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        $review->update($validated);

        return redirect()->route('admin.reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy(\App\Models\Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }
}
