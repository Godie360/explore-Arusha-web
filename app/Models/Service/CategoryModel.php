<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = "categories";

    protected $fillable = [
        "name", "icon", "slug", "description"
    ];

    public $incrementing = false;
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
            $model->slug = Str::slug($model->name);
        });
        static::updating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
    public function subcategories(){
        return $this->hasMany(SubCategoryModel::class,'category_id');
    }
    public function services(){
        return $this->hasMany(ServiceModel::class,"category_id");
    }

    public function serviceCount() : Attribute {
        return Attribute::make(
            get: function (){
                return $this->services()->count();
            }
        );
    }
}
