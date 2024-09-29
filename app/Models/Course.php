<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;


    protected $fillable = [
        'slug',
        'name',
        'price',
        'level'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            $course->slug = Str::slug($course->name);
        });
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
