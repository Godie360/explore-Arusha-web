<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    use HasFactory;


    protected $primaryKey = 'HotelID'; 

    protected $fillable = [
        'HotelName',
        'Description',
        'Address',
        'City',
        'Email',
        'Contact_Number',
        'Check_in_time',
        'Check_out_time',
    ];
}
