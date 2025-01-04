<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'latitude', 'longitude', 'images'];

    protected $casts = [
        'images' => 'array', // Automatically decode JSON to an array
    ];
}
