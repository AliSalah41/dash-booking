<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ['room_type','price', 'event_id'];
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

    public function hotelticket()
    {
        return $this->hasMany(Hotel_Ticket::class);
    }


}
