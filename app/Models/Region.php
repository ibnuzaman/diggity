<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function serviceOrder(): HasMany
    {
        return $this->hasMany(ServiceOrder::class);
    }

    public function regencies(): HasMany
    {
        return $this->hasMany(Regency::class);
    }
}
