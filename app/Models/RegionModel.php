<?php

namespace App\Models;

use App\Models\Traits\ModelTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class RegionModel extends Model
{
    use HasFactory, ModelTraits;
    protected $table = "regions";
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'code',
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

    public function districts()
    {
        return $this->hasMany(DistrictModel::class);
    }
}
