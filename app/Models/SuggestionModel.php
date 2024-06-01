<?php

namespace App\Models;

use App\Enums\ComplaintStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SuggestionModel extends Model
{
    use HasFactory;
    protected $table = "suggestions";
    protected $fillable = [
        'institution_id',
        'complaint_type',
        'description',
        'full_name',
        'phone',
        'email',
        'status',
        'agent',
        'readed_on',
        'completed_on',
        'user_id'
    ];
    protected $casts = [
        'readed_on' => 'datetime',
        'completed_on' => 'datetime',
        'status' => ComplaintStatusEnum::class
    ];
    public $incrementing = false;
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
    public function institution()
    {
        return $this->belongsTo(InstitutionModel::class, 'institution_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function scopePending($query)
    {
        return $query->where('status', ComplaintStatusEnum::Pending->value);
    }
    public function scopeCompleted($query)
    {
        return $query->where('status', ComplaintStatusEnum::Completed->value);
    }
    public function scopeAllComplaints($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
    public function scopeComplaintsThisMonth($query)
    {
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString();
        return $query->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
    }
}
