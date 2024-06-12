<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tours extends Model
{
    use HasFactory;

    protected $primaryKey = 'TourID'; 

    protected $fillable = [
        'Name',
        'Description',
        'PricePerPerson',
        'Location',
        'Max_Participant',
        'Min_Participant',
        'Image',
        'CategoryID',
    ];

    public function category()
    {
        return $this->belongsTo(ToursCategory::class, 'CategoryID');
    }
}
