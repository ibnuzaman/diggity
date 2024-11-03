<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Webinar extends Model
{
    use HasUuids;    

    protected $fillable = [
        'title',
        'image',
        'webinar_date',
        'start_time',
        'end_time',
        'meeting_room',
        'starting_price',
        'discounted_price',
        'final_price',
        'description',
        'category_id',
        'material_id',
        'speaker_id'
    ];
    
    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function speakers()
    {
        return $this->hasMany(Speaker::class);
    }
}
