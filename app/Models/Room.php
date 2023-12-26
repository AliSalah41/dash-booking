<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public function hotelticket()
    {
        return $this->hasMany(Hotel_Ticket::class);
    }
}
