<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder ;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'is_read',
        'user_id',
        'status',
        'event',
        'model_id',
        'model_type',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function mediaable()
    {
        return $this->morphTo();
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeStatus($query)
    {
        $query->where('status',"no_action");
    }
}
