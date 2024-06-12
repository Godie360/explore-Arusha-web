<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    use HasFactory;

    protected $primaryKey = 'Amenity_id'; 

    protected $fillable = [
        'name',
        'icon',
        'description',
    ];

    public function apartments()
    {
        return $this->belongsToMany(Apartment::class, 'apartment_amenity', 'Amenity_id', 'ApartmentID');
    }
}
