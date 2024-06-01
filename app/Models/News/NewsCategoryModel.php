<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsCategoryModel extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'name'];
    public $incrementing = false;
    protected $table = 'news_categories';

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
            $model->slug = Str::slug($model->name);
        });
    }
    public function news()
    {
        return $this->belongsToMany(NewsModel::class, 'category_news');
    }

    public function addNews($news)
    {
        $this->news()->attach($news);
    }

    public function removeNews($news)
    {
        $this->news()->detach($news);
    }
}
