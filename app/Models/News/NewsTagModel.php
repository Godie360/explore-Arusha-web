<?php

namespace App\Models\News;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsTagModel extends Model
{
    use HasFactory;
    public $fillable = ['created_by', 'news_id', 'model_type', 'model_id'];

    public $incrementing = false;
    protected $table = 'news_tags';

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
            $model->created_by = $model->created_by ?? auth()->user()->id;
        });
    }

    public function model()
    {
        return $this->morphTo();
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function news()
    {
        return $this->belongsTo(NewsTagModel::class, 'news_id', 'id');
    }
}
