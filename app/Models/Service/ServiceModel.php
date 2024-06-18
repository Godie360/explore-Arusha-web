<?php

namespace App\Models\Service;

use App\Models\Company\CompanyModel;
use App\Models\CurrencyModel;
use App\Models\Setting\FileModel;
use App\Models\Setting\ViewModel;
use App\Models\User;
use Aws\Api\Service;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ServiceModel extends Model
{
    use HasFactory;
    protected $table = "services";

    protected $fillable = [
        "title", "featured_image", "slug", "short_description", "description", "promo_video", "website",
        "address", "phone", "email", "location", "min_price", "max_price", "category_id", "sub_category_id",
        "currency_id", "company_id", "user_id", "verified_at", "status", "views_count","rate"
    ];

    public $incrementing = false;
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
            $model->user_id = $model->user_id ?? auth()->user()->id;
            $model->slug = Str::slug($model->title);
        });
        static::updating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
    }

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, "category_id");
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategoryModel::class, "sub_category_id");
    }

    public function currency()
    {
        return $this->belongsTo(CurrencyModel::class, "currency_id");
    }

    public function company()
    {
        return $this->belongsTo(CompanyModel::class, "company_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function service_amenities()
    {
        return $this->hasMany(ServiceAmenityModel::class, 'service_id');
    }

    public function amenities()
    {
        return $this->hasManyThrough(
            AmenityModel::class,
            ServiceAmenityModel::class,
            'service_id',
            'id',
            'id',
            'amenity_id'
        );
    }

    public function files()
    {
        return $this->morphMany(FileModel::class, "filable");
    }

    public function views()
    {
        return $this->morphMany(ViewModel::class, "viewable");
    }

    public function reviews()
    {
        return $this->morphMany(ReviewModel::class, 'reviable');
    }

    public function priceRange(): Attribute
    {
        return Attribute::make(
            get: fn () =>  trim($this->min_price . ' - ' . $this->max_price),
        );
    }
}
