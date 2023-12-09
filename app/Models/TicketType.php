<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    use HasFactory;
    protected $table = 'ticket_types';
    protected $fillable = [
        'event_id', // Add other fields if necessary
        'ticket_type',      // Add 'from' field here
        'price',
        'ticket_limit',

    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
