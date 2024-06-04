<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class StaffModel extends Model
{
    use HasFactory;
    protected $table = "staffs";
    protected $fillable = [
        "first_name", "last_name", "middle_name", "id_number", "email", "phone", "address", "company_id",
        "staff_type_id", "id_type_id"
    ];

    public $incrementing = false;
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function name(): Attribute
    {
        return Attribute::make(
            get: fn () =>  trim($this->first_name . ' ' . ($this->middle_name ? $this->middle_name . ' ' : '') . $this->last_name),
        );
    }

    public function profilePhoto(): Attribute
    {
        $name = trim(collect(explode(' ', $this->first_name . ' ' . $this->last_name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));
        $photo = 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=7F9CF5&background=EBF4FF';

        if ($this->profile_photo_path) {
            $photo = $this->profile_photo_path;
        }
        return Attribute::make(
            get: fn () =>  $photo,
        );
    }
}
