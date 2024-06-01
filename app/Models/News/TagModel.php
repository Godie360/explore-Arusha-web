<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TagModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'secure_token'
    ];
    public $incrementing = false;
    protected $table = 'tags';
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
            $model->name = $model->name;
            $model->secure_token = (string) Str::slug($model->name);
        });
        static::updating(function ($model) {
            $model->name = $model->name;
            $model->secure_token = (string) Str::slug($model->name);
        });
    }

    public function news()
    {
        return $this->hasManyThrough(NewsModel::class, NewsTagModel::class, "model_id", "id", "id", "news_id");
    }
}
