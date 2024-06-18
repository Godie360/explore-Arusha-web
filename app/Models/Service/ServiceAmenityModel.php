<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ServiceAmenityModel extends Model
{
    use HasFactory;
    protected $table = "service_amenities";

    protected $fillable = [
        "service_id", "amenity_id"
    ];

    public $incrementing = false;
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function service()
    {
        return $this->belongsTo(ServiceModel::class, "service_id");
    }

    public function amenity()
    {
        return $this->belongsTo(AmenityModel::class, "amenity_id");
    }
}
