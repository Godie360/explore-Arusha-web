<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class DistrictModel extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;
    protected $table = "districts";

    protected $fillable = [
        'name',
        'code',
        'region_id'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
        static::updating(function ($model) {
        });
    }

    public function region()
    {
        return $this->belongsTo(RegionModel::class, 'region_id');
    }
}
