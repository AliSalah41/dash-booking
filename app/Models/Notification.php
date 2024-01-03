<?php

namespace App\Models;

use Carbon\Carbon;
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
        'date' => 'array',
    ];
    protected $appends  = ['title','date','route'];


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
    public function scopeDash($query)
    {
        $query->where('is_dash',true);
    }

    public function getTitleAttribute()
    {
        if ($this->event == 'edit_ticket'){
            return 'edit ticket request';

        }
    }

    public function getDateAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
    public function getRouteAttribute()
    {
        return route('ticket-requests.show',$this->model_id);
    }

}
