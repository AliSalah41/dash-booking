<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel_Ticket extends Model
{

    protected $table = 'hotel_tickets';
    use HasFactory;
    public function tickets()
    {
        return $this->hasMany(Ticket::class ,'ticket_id');
    }
    public function hotels()
    {
        return $this->belongsTo(Hotel::class ,'hotel_id');
    }

}
