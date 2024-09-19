<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    use HasFactory;

    protected $fillable = ['ip_address', 'visited_at', 'hits'];
    protected $table = 'visitors';

    protected $attributes = [
        'hits' => 0,
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($tracker) {
            $tracker->visited_at = now();
            $tracker->hits++;
        });
    }

    public static function hit()
    {
        static::firstOrCreate([
            'ip_address' => request()->ip(),
            'visited_at' => now()->toDateString(),
        ])->save();
    }
}
