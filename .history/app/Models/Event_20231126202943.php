<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Event extends Model
{
    // implements TranslatableContract
    // use Translatable;
    use HasFactory;
    // public $translatedAttributes = ['name', 'description'];
    // // You can specify the supported locales in your model, for example:
    //     public $translationModel = 'App\Models\EventTranslation';
    //     public $translationForeignKey = 'event_id';
    //     public $localeKey = 'locale';
    protected $fillable = ['name', 'address', 'description', 'category_id', 'country_id', 'city_id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function eventTimes()
    {
        return $this->hasMany(EventTime::class);
    }
    public function ticketTypes()
    {
        return $this->hasMany(TicketType::class);
    }
    public function images()
    {
        return $this->morphMany(Media::class, 'mediaable');
    }
    public function prices()
    {
        return $this->morphMany(Price::class, 'model');
    }
    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

    public function transportations()
    {
        return $this->hasMany(Transportation::class);
    }
    public function entertainments()
    {
        return $this->hasMany(Entertainment::class);
    }
}
