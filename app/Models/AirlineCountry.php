<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirlineCountry extends Model
{
    protected $table= 'airlines_countries';
    protected $fillable = ['country_airport'];
    use HasFactory;
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    public function confirmtickets()
    {
        return $this->hasMany(Confirm_Ticket::class);
    }
}
