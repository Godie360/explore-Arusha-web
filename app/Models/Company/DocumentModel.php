<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DocumentModel extends Model
{
    use HasFactory;
    protected $table = "company_documents";
    protected $fillable = [
        "company_id", "key", "name", "attachment", "document_type_id"
    ];
    public $incrementing = false;
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function scopeDocType($query, $typeId)
    {
        return $query->where("document_type_id", $typeId);
    }

    public function document_type()
    {
        return $this->belongsTo(DocumentTypeModel::class, "document_type_id");
    }

    public function url(): Attribute
    {
        return Attribute::make(
            get: function () {
                return asset($this->attachment);
            }
        );
    }
}
