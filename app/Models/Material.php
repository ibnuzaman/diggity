<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Material extends Model
{
    use HasUuids;

    protected $fillable = [
        'material_name',
        'webinar_id',
        'material_count'
    ];

    public function webinar()
    {
        return $this->belongsTo(Webinar::class);
    }

    public function SubMaterials()
    {
        return $this->hasMany(SubMaterials::class);
    }
}
