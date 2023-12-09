<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
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
        return $this->belongsTo(Hotel_Ticket::class ,'hotel_ticket_id');
    }
    public function tickettype()
    {
        return $this->belongsTo(TicketType::class, 'ticket_type_id');
    }
    public function check_in()
    {
        return $this->belongsTo(check_in::class , 'ticket_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function airlinecountry()
    {
        return $this->belongsTo(AirlineCountry::class , 'airlines_counrty_id');
    }
    public function confirmtickets()
    {
        return $this->hasMany(Confirm_Ticket::class);
    }
}
