<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class PackageItems extends Model
{
    use HasFactory, Translatable;
    public $translatedAttributes = ['details'];
    protected $fillable = ['price', 'appKey', 'companyable_type', 'companyable_id'];

    public function companyable()
    {
        return $this->morphTo();
    }
}
