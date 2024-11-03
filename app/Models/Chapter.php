<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasUuids;

    protected $fillable = [
        'chapter_name',
        'chapter_order',
        'material_id',        
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
    public function sub_chapter()
    {
        return $this->hasMany(SubChapter::class);
    }
}
