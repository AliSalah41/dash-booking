<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirLine extends Model
{
    use HasFactory;

    protected $table = 'airlines', $guarded=[];

    public function Event(){
        return $this->belongsTo(Event::class);
    }

    public function Times(){
        return $this->hasMany(AirLineTime::class, 'airline_id');
    }
}
