<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
  
    protected $fillable = ['price','currency'];
    public $timestamps = false;
    use HasFactory;
    public static $currencies = ['EUR', 'TND', 'EGP', 'GBP'];
    public function model()
    {
        return $this->morphTo();
    }
}
