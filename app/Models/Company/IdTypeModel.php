<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class IdTypeModel extends Model
{
    use HasFactory;
    protected $table = "id_types";

    protected $fillable = [
        "name", "description"
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
        return $this->hasMany(StaffModel::class, "id_type_id");
    }
}
