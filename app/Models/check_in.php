<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class check_in extends Model
{
    use HasFactory;
    // public function tickets()
    // {
    //     return $this->hasMany(Ticket::class);
    // }
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
    
}
