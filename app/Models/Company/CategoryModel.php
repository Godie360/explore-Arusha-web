<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class  CategoryModel extends Model
{
    use HasFactory;
    protected $table = "company_categories";
    protected $fillable = [
        "name", "description", "slug", "icon"
    ];
    public $incrementing = false;
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
            $model->slug = Str::slug($model->name);
        });
    }


    public function companies()
    {
        return $this->belongsTo(CompanyModel::class, "company_id");
    }
}
