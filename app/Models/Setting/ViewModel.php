<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ViewModel extends Model
{
    use HasFactory;
    public $table = "views";
    public $fillable = ['viewable_type', 'viewable_id', 'agent', 'user_id'];

    public function viewable()
    {
        return $this->morphTo();
    }

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
            $model->user_id = auth()->check() ? auth()->id() : null;
        });
    }
}
