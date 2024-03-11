<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'year',
        'color',
        'license_plate',
        'price_per_day',
        'availability',
        'category_id',
        'driver_id',
        'kilometers',
    ];

    // Define relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
