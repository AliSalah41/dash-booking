<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function cities()
    {
        return $this->hasMany(City::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
