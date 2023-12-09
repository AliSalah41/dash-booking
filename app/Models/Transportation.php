<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    use HasFactory;
    protected $fillable = ['price', 'event_id'];
    protected $table = 'transportions';
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    public function confirmtickets()
    {
        return $this->hasMany(Confirm_Ticket::class);
    }

}
