<?php

namespace App\Models;

use App\Models\Setting\FileModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GalleryModel extends Model
{
    use HasFactory;
    protected $table = "galleries";
    protected $fillable = [
        'name',
        'description',
        'featured_image'
    ];
    public $incrementing = false;
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function files()
    {
        return $this->morphMany(FileModel::class, "filable");
    }

    public function getFeaturedAttribute()
    {
        $images = null;
        if (!$this->featured_image) {
            if ($this->files()->count() > 0) {
                $images = $this->files[0]->file;
            }
        } else {
            $images = $this->featured_image;
        }
        return $images;
    }



    public function getImagesAttribute()
    {

        $images = [];

        if ($this->files()->count() > 0) {
            foreach ($this->files as $file) {
                $images[] = $file->file;
            }
        } else {
            $images[] = $this->featured_image;
        }

        return $images;
    }
}
