<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class SubChapter extends Model
{
    use HasUuids;

    protected $fillable = [
        'sub_chapter_name',
        'sub_chapter_order',
        'chapter_id',
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
