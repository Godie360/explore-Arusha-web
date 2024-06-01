<?php

namespace App\Models\News;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsDetailModel extends Model
{
    use HasFactory;
    public $fillable = ['id','news_id','title','short_description','description','created_by'];
    public $incrementing = false;
    protected $table = 'news_details';

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
            $model->created_by = $model->created_by ?? auth()->user()->id;
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function news()
    {
        return $this->belongsTo(NewsModel::class, 'news_id', 'id');
    }
}
