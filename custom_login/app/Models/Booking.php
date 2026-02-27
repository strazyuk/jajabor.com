<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = ['flight_name', 'user_name', 'status', 'total_price'];

    // Default attributes
    protected $attributes = [
        'status' => 'confirmed',
    ];

    /**
     * Relationship to the Flight model.
     */
    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_name', 'flight_number');
    }

    /**
     * Relationship to the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_name', 'name');
    }
}
