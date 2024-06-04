<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class StaffTypeModel extends Model
{
    use HasFactory;
    protected $table = "staff_types";

    protected $fillable = [
        "name", "description","company_id"
    ];

    public $incrementing = false;
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function staffs()
    {
        return $this->hasMany(StaffModel::class, "staff_type_id");
    }

    public function company()
    {
        return $this->belongsTo(CompanyModel::class, "company_id");
    }
}
