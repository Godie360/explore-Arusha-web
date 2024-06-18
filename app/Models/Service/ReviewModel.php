<?php

namespace App\Models\Service;

use App\Models\Setting\FileModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ReviewModel extends Model
{
    use HasFactory;
    protected $table = "reviews";

    protected $fillable = [
        'body', 'rate', 'company_id', 'name', 'phone', 'email', 'reviable_type', 'reviable_id'
    ];
    public $incrementing = false;
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function reviewable()
    {
        return $this->morphTo();
    }

    public function files()
    {
        return $this->morphMany(FileModel::class, "filable");
    }
}
