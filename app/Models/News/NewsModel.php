<?php

namespace App\Models\News;

use App\Enums\NewsStatusEnum;
use App\Models\Setting\FileModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'futured_image',
        'video_url',
        'status',
        'user_id',
        'view_count',
        'token',
        'news_category_id',
        'published_at',
    ];
    public $incrementing = false;
    protected $table = 'news';
    protected $casts = [
        "status" => NewsStatusEnum::class,
        'published_at' => 'datetime'
    ];
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
            $model->token = self::generateUniqueToken();
            $model->slug = $model->slug ?? Str::slug(request()->title);
            $model->user_id = auth()->id() ?? $model->user_id;
        });
        static::updating(function ($model) {
            $model->slug = $model->slug ?? Str::slug(request()->title);
        });
    }
    public static function generateUniqueToken()
    {
        do {
            $token = Str::random(15);
        } while (NewsModel::where("token", "=", $token)->first());
        return $token;
    }
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function news_category()
    {
        return $this->belongsTo(NewsCategoryModel::class, "news_category_id");
    }
    public function categories()
    {
        return $this->belongsToMany(NewsCategoryModel::class, 'category_news');
    }
    public function files()
    {
        return $this->morphMany(FileModel::class, "filable");
    }
    public function addCategory($category)
    {
        $this->categories()->attach($category);
    }
    public function removeCategory($category)
    {
        $this->categories()->detach($category);
    }
    public function detail()
    {
        return $this->hasOne(NewsDetailModel::class, 'news_id', 'id')->latest();
    }
    public function details()
    {
        return $this->hasMany(NewsDetailModel::class, 'news_id', 'id');
    }
    public function getWebShowUrlAttribute()
    {
        return route('web.news.show', ['news' => $this->slug]);
    }
    public function getCreatedTimeAttribute()
    {
        return $this->created_at->diffForHumans(null, false, true);
    }
    public function getNewsTimeAttribute()
    {
        $time = $this->created_at->diff(Carbon::now());
        if ($time->d < 2) {
            return $this->created_at->diffForHumans();
        }
        return $this->created_at->format('F d, Y H:i');
    }
    public function getImagesAttribute()
    {
        $images = [];
        if ($this->files()->count() > 0) {
            foreach ($this->files as $file) {
                $images[] = $file->file;
            }
        } else {
            $images[] = $this->futured_image;
        }
        return $images;
    }
    public function tags()
    {
        return $this->hasMany(NewsTagModel::class, "news_id")->where("model_type", TagModel::class);
    }
    public function getTagNamesAttribute()
    {
        $tag = null;
        foreach ($this->tags as $item) {
            if ($tag != "") {
                $tag .= ",";
            }
            $t = @$item->model->name;
            $sr = $t;
            $tag .= $sr;
        }
        return $tag;
    }
}
