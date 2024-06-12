<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $primaryKey = 'ApartmentID'; 

    protected $fillable = [
        'ApartmentName',
        'ApartmentDescription',
        'ApartmentHostName',
        'ApartmentAddress',
        'ApartmentLocation',
        'ApartmentPrice',
    ];

    public function amenities()
    {
        return $this->belongsToMany(Amenities::class, 'apartment_amenity', 'ApartmentID', 'Amenity_id');
    }

}
