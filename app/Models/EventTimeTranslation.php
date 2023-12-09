<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTimeTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['event_time_id', 'title', 'locale','desc_time'];
}
