<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentAmenities extends Model
{
    use HasFactory;

    protected $primaryKey = 'Apartment_AmenityID'; 
    
    protected $fillable = [
        'ApartmentID',
        'Amenity_id',
    ];
}
