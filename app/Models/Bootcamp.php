<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Bootcamp extends Model
{
    use HasUuids;

    protected $fillable = [
        'name',
        'description',
        'bootcamp_date',
        'available_seats',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
