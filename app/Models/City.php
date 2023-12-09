<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function Country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
