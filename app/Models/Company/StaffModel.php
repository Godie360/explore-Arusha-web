<?php

namespace App\Models\Company;

use App\Enums\CompanyStatusEnum;
use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class StaffModel extends Model
{
    use HasFactory;
    protected $table = "staffs";
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'address',
        'id_number',
        'id_type_id',
        'gender',
        'date_of_birth',
        'education',
        'bio',
        'work_experience',
        'status',
        'company_id',
        'staff_type_id',
        'country_id',
        'profile_photo_path'
    ];

    public $incrementing = false;
    protected $casts = [
        "gender" => GenderEnum::class,
        "status" => CompanyStatusEnum::class,
        'date_of_birth' => 'date'
    ];
    protected $appends = [
        "name", "profile_photo"
    ];
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
            $model->system_number = self::system_number($model);
        });
    }


    public static function system_number($model)
    {
        $value = $model->company->company_name;
        $words = explode(' ', $value);
        if (count($words) == 1) {
            // Extract the first two characters if it's a single word
            $company_short_name = substr($value, 0, 2);
        } else {
            // Extract the first character of each word if there are multiple words
            $company_short_name = implode('', array_map(function ($word) {
                return substr($word, 0, 1);
            }, $words));
        }

        $request_id = 0;
        $prefix = $company_short_name . "-" . date('dmy') . "-";
        $lastOrder = self::orderBy('created_at', 'DESC')
            ->where('company_id', $model->company_id)
            ->first();

        if ($lastOrder) {
            $request_id = substr($lastOrder->system_number, strlen($prefix));
        }

        $request_id = (int) $request_id + 1;
        $len = max(3, strlen($request_id));
        $paddedOrderNo = str_pad($request_id, $len, '0', STR_PAD_LEFT);
        $newOrderNo = $prefix . $paddedOrderNo;

        while (self::where('system_number', $newOrderNo)->exists()) {
            $exitId = (int) substr($newOrderNo, strlen($prefix)) + 1;
            $newLen = max(3, strlen($exitId));
            $paddedExitId = str_pad($exitId, $newLen, '0', STR_PAD_LEFT);
            $newOrderNo = $prefix . $paddedExitId;
        }

        return $newOrderNo;
    }

    public function company()
    {
        return $this->belongsTo(CompanyModel::class, "company_id");
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
