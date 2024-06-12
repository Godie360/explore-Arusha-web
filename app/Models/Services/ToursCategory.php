<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToursCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'CategoryID'; 

    protected $fillable = [
        'Categories',
        'Description',
    ];

    public function tours()
    {
        return $this->hasMany(Tours::class, 'CategoryID');
    }
}
