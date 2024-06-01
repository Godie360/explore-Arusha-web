<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Company\CompanyModel;
use App\Models\Company\CompanyUserModel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;

class User extends Authenticatable implements LaratrustUser
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $incrementing = false;

    protected $fillable = [
        'system_number',
        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'email',
        'password',
        'address',
        'id_type_id',
        'id_number',
        'profile_photo_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
            $model->system_number = self::system_number();
        });
        static::updating(function ($model) {
        });
    }

    public static function system_number()
    {
        $request_id = 0;
        $prefix = date('dmy') . "-";
        $lastOrder = User::orderBy('created_at', 'DESC')->first();
        if ($lastOrder) {
            $request_id = substr($lastOrder->system_number, strlen($prefix));
        }
        $request_id = (int)$request_id + 1;
        $len = max(3, strlen($request_id));
        $paddedOrderNo = str_pad($request_id, $len, '0', STR_PAD_LEFT);
        $newOrderNo = $prefix . $paddedOrderNo;
        while (User::where('system_number', $newOrderNo)->exists()) {
            $exitId = (int) substr($newOrderNo, strlen($prefix)) + 1;
            $newLen = max(3, strlen($exitId));
            $paddedExitId = str_pad($exitId, $newLen, '0', STR_PAD_LEFT);
            $newOrderNo = $prefix . $paddedExitId;
        }
        return $newOrderNo;
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

    public function companies()
    {
        return $this->belongsToMany(CompanyModel::class, 'company_users', 'user_id', 'company_id');
    }

    public function company()
    {
        return $this->hasOneThrough(
            CompanyModel::class,
            CompanyUserModel::class,
            'user_id', // Foreign key on the CompanyUser table
            'id',      // Local key on the User table
            'id',      // Local key on the Company table
            'company_id' // Foreign key on the CompanyUser table
        );
    }
}
