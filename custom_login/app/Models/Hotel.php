<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

<<<<<<< Updated upstream
    // Add all the fields to the fillable array for mass assignment
    protected $fillable = ['name', 'location', 'latitude', 'longitude', 'images', 'price'];

    protected $casts = [
        'images' => 'array', // Automatically decode JSON to an array
    ];
=======
    // Add the 'price' field to the fillable array for mass assignment
    protected $fillable = ['name', 'location', 'price']; 

    // Alternatively, you could use guarded if you prefer to specify which fields are not mass assignable
    // protected $guarded = ['id']; 
>>>>>>> Stashed changes
}
