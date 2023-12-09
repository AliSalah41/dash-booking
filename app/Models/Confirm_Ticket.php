<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirm_Ticket extends Model
{
    use HasFactory;
    protected $table= 'confirm_tickets';
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function transportation()
    {
        return $this->belongsTo(Transportation::class , 'transportion_id');
    }

    public function entertainment()
    {
        return $this->belongsTo(Entertainment::class);
    }

    public function hotelticket()
    {
        return $this->belongsTo(Hotel_Ticket::class);
    }
    public function tickettype()
    {
        return $this->belongsTo(TicketType::class, 'ticket_type_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function airlinecountry()
    {
        return $this->belongsTo(AirlineCountry::class , 'airlines_counrty_id');
    }
    public function tickets()
    {
        return $this->belongsTo(Ticket::class , 'ticket_id');
    }
}
