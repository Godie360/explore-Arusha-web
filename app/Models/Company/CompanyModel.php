<?php

namespace App\Models\Company;

use App\Models\CountryModel;
use App\Models\DistrictModel;
use App\Models\RegionModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CompanyModel extends Model
{
    use HasFactory;
    protected $table = "companies";
    protected $fillable = [
        'company_id',
        "company_category_id",
        'company_type',
        'company_name',
        'business_name',
        'country_id',
        'region_id',
        'district_id',
        'physical_address',
        'street_address',
        'company_email',
        'company_phone',
        'year_of_establishment',
        'number_of_employees',
        'licence_number',
        'vat_no',
        'tin_number',
        "website",
        'contact_person_name',
        'contact_person_title',
        'contact_person_phone',
        'contact_person_email',
        'logo',
        'cover_photo',
        'description',
        "approved_at",
        "status",
    ];










    protected $casts = [
        'year_established' => 'integer',
        'number_of_employees' => 'integer',
        'approved_at' => 'datetime',
        'status' => 'integer',
    ];

    protected $appends = ["logo_url"];
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
            $model->company_id = self::company_id();
        });
    }


    public static function company_id()
    {
        $request_id = 0;
        $prefix = date('dmy') . "-";
        $lastOrder = CompanyModel::orderBy('created_at', 'DESC')->first();
        if ($lastOrder) {
            $request_id = substr($lastOrder->company_id, strlen($prefix));
        }
        $request_id = (int)$request_id + 1;
        $len = max(3, strlen($request_id));
        $paddedOrderNo = str_pad($request_id, $len, '0', STR_PAD_LEFT);
        $newOrderNo = $prefix . $paddedOrderNo;
        while (CompanyModel::where('company_id', $newOrderNo)->exists()) {
            $exitId = (int) substr($newOrderNo, strlen($prefix)) + 1;
            $newLen = max(3, strlen($exitId));
            $paddedExitId = str_pad($exitId, $newLen, '0', STR_PAD_LEFT);
            $newOrderNo = $prefix . $paddedExitId;
        }
        return $newOrderNo;
    }


    public function companyCategory()
    {
        return $this->belongsTo(CategoryModel::class, 'company_category_id');
    }

    public function country()
    {
        return $this->belongsTo(CountryModel::class, 'country_id');
    }

    public function region()
    {
        return $this->belongsTo(RegionModel::class, 'region_id');
    }

    public function district()
    {
        return $this->belongsTo(DistrictModel::class, 'district_id');
    }





    public function documents()
    {
        return $this->hasMany(DocumentModel::class, "company_id");
    }


    public function users()
    {
        return $this->belongsToMany(User::class, 'company_users', 'company_id', 'user_id');
    }


    public function logoUrl(): Attribute
    {
        $name = trim(collect(explode(' ', $this->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));
        $photo = 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=7F9CF5&background=EBF4FF';

        if ($this->logo) {
            $photo = $this->logo;
        }
        return Attribute::make(
            get: fn () =>  $photo,
        );
    }
}
