<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Company extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    public $translatedAttributes = ['name', 'details'];
    protected $fillable = ['type', 'price', 'total_available', 'available', 'image', 'appKey'];

    public function packages()
    {
        return $this->morphMany(PackageItems::class, 'companyable');
    }

}
