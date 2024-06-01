<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ContactModel extends Model
{
    use HasFactory;
    protected $table = "contacts";
    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'subject',
        'message',
        'agent',
        'readed_on',
    ];
    protected $casts = [
        'readed_on' => 'datetime',
    ];
    public $incrementing = false;
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
}
