<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirLineTime extends Model
{
    use HasFactory;
    protected  $table='airline_times', $guarded=[];
}
