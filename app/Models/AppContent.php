<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class AppContent extends Model
{
    use HasFactory;
    protected $table="app_content";

    protected $fillable =[
        "title",
        "key",
        "content",
        "local",
        "appKey",
        "user_id",
        "countries_id",
        "type"
    ];
}
