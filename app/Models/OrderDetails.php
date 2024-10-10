<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasUuids;

    protected $fillable = [
        'external_id',
        'no_transaction',
        'price',
        'discount',
        'unique_code',
        'tax',
        'service_charge',
        'invoice_url',
        'total_price',
        'status',
        'user_id',
        'course_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->unique_code)) {
                $model->unique_code = Str::random(10);
            }
        });

        static::creating(function ($model) {
            if (empty($model->external_id)) {
                $model->external_id = 'DGID-' . $model->unique_code;
            }
            if (empty($model->no_transaction)) {
                $model->no_transaction = 'DGT-' . $model->unique_code;
            }
        });

        static::creating(function ($model) {
            $model->course->increment('subscriber');
        });

        static::updated(function ($model) {
            if ($model->status === 'success') {
                $model->course->increment('subscriber');
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
