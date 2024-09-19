<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable = ['ip_address', 'visit_date'];
    protected $table = 'visitors';

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($traffic) {
            if ($traffic->visits) {
                $traffic->visits++;
            }
        });
    }
}
