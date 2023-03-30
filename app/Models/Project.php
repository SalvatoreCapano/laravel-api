<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'slug',
        'image',
        'type_id',
        // 'technologies'
    ];

    protected $appends = [
        'full_image_path'
    ];

    public function getFullImagePathAttribute()
    {
        $fullPath = null;

        if ($this->image) {
            $fullPath = asset('storage/' . $this->image);
        }

        return $fullPath;
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}