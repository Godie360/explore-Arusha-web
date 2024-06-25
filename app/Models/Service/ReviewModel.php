<?php

namespace App\Models\Service;

use App\Models\Setting\FileModel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ReviewModel extends Model
{
    use HasFactory;
    protected $table = "reviews";

    protected $fillable = [
        'body', 'rate', 'company_id', 'name', 'phone', 'email', 'status','anonymous', 'reviable_type', 'reviable_id'
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


    public function profilePhoto(): Attribute
    {
        $name = trim(collect(explode(' ', $this->name ))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));
        $photo = 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=7F9CF5&background=EBF4FF';

        if ($this->profile_photo_path) {
            $photo = $this->profile_photo_path;
        }
        return Attribute::make(
            get: fn () =>  $photo,
        );
    }
}
