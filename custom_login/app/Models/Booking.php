<?php

// app/Models/Booking.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['flight_id', 'customer_name', 'customer_email'];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}
