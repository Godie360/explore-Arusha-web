<?php

namespace App\Models\Company;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CompanyUserModel extends Model
{
    use HasFactory;
    protected $table = "company_users";
    protected $fillable = ["company_id", "user_id"];
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function company()
    {
        return $this->belongsTo(CompanyModel::class, "company_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
