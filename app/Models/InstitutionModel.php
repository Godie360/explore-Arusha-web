<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class InstitutionModel extends Model
{
    use HasFactory;
    protected $table = "institutions";

    protected $fillable = [
        'name',
        'type',
        'contact_person_name',
        'contact_person_phone',
        'contact_person_email',
        'address',
    ];

    public $incrementing = false;
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
            $model->slug = Str::slug($model->name);
        });
    }
}
