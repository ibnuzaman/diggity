<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Material extends Model
{
    use HasUuids;

    protected $fillable = [
        'material_name',        
        'webinar_id',
    ];

    public function webinar()
    {
        return $this->belongsTo(Webinar::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
