<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Speaker extends Model
{
    
    use HasUuids;

    protected $fillable = [
        'speaker_name',
        'speaker_job',
        'speaker_summary',
        'company_speaker',
        'speaker_image',
        'webinar_id'        
    ];

    public function webinars()
    {
        return $this->belongsTo(Webinar::class);
    }
}

