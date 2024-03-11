<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'license_number',
        'contact_number',
    ];

    // Define relationships
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
