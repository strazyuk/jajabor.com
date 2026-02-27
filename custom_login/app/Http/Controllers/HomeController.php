<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $packages = \App\Models\Package::where('is_active', true)->take(3)->get();
        $news = \App\Models\News::where('is_published', true)->orderBy('published_at', 'desc')->take(2)->get();
        $coupons = \App\Models\Coupon::where('expiration_date', '>', now())->take(2)->get();
        $offers = \App\Models\Offer::where('is_active', true)->where('valid_until', '>', now())->take(1)->get();
        $reviews = \App\Models\Review::where('is_featured', true)->take(2)->get();

        // Fetch some basic stats for the user
        $flightBookingsCount = \App\Models\Booking::where('user_name', $user->name)->count();
        $hotelBookingsCount = \Illuminate\Support\Facades\DB::table('hotel_bookings')->where('user_id', $user->id)->count();

        return view('home', compact('user', 'packages', 'news', 'coupons', 'offers', 'reviews', 'flightBookingsCount', 'hotelBookingsCount'));
    }
}
