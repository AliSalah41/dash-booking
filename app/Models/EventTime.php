<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class EventTime extends Model
{
    // implements TranslatableContract
    // use Translatable;
    // public $translatedAttributes = ['title', 'desc_time'];
    protected $table = 'event_times';
    public $timestamps = false;
    protected $fillable = [
        'event_id', // Add other fields if necessary
        'from',      // Add 'from' field here
        'to',
        'title',
        'desc_time'
    ];
    use HasFactory;
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function images()
    {
        return $this->morphMany(Media::class, 'mediaable');
    }
}
