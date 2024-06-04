<?php

namespace App\Models\Company;

use App\Models\Traits\ModelTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DocumentTypeModel extends Model
{
    use HasFactory, ModelTraits;
    protected $table = "document_types";
    protected $fillable = ["name","key"];
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
}
