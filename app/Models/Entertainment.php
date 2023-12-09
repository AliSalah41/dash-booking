<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entertainment extends Model
{
    use HasFactory;

    protected $fillable = ['title','description', 'address','start_dateTime','end_dateTime','price','event_id'];
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
