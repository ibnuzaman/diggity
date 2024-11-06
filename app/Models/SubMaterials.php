<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class SubMaterials extends Model
{
    use HasUuids;

    protected $fillable = [
        'sub_material_name',
        'sub_material_count',
        'sub_material_order',
        'material_id'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
