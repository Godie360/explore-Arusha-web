<?php

namespace App\Models\Setting;

use App\Http\Helpers\SystemHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class OtpModel extends Model
{
    use HasFactory, SoftDeletes;

    public $table = "otps";
    public $fillable = ['otp', 'is_validated', 'varifiable_id', 'varifiable_type'];
    public $incrementing = false;
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function varifiable()
    {
        return $this->morphTo();
    }

    public function scopeActive($query)
    {
        return $query->whereNull('is_validated')->where("created_at", ">", Carbon::now()->addMinutes(-5)->format("Y-m-d H:i:s"));
    }

    public function scopeVerify($query)
    {
        $user = $query->where('otp', request()->input('code', null))->active()->first();
        if ($user) {
            $user->is_validated = Carbon::now()->format('Y-m-d H:i:s');
            $user->save();
            // return SystemHelper::response($user->varifiable, "Verified Success", true, 200, 0);
        } else {
            // return SystemHelper::response([], "Invilid Otp", false, 200, 0);
        }
    }

    public function scopeCreateOtp($query, $phone, $id, $type = null)
    {
        $create = SystemHelper::generateStrongPassword(6, false, 'd'); // Carbon::now()->format("iHs");
        OtpModel::create([
            'otp' => $create,
            'varifiable_id' => $id,
            'varifiable_type' => $type
        ]);
        // HemmySendSms::send([str_replace("+", "", $phone)], "Dear customer your verification code is : $create");
    }

    public function scopeCreateOtpNew($query, $code, $id, $type = null)
    {
        OtpModel::create([
            'otp' => $code,
            'varifiable_id' => $id,
            'varifiable_type' => $type
        ]);
    }

    public function scopeVerifyNew($query)
    {
        $user = $query->where('otp', request()->input('code', null))->active()->first();
        if ($user) {
            $user->is_validated = Carbon::now()->format('Y-m-d H:i:s');
            $user->save();
            return true;
        } else {
            return false;
        }
    }
}
