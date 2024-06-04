<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CurrencyModel extends Model
{

    use HasFactory;
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "currencies";


    protected $fillable = [
        'name',
        'code',
        'exchange_rate'
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
}
