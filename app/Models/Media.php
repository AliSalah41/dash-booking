<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = "medias";
    protected $fillable = [
        'mediaable_type',
        'mediaable_id',
        'filename',
        'filetype',
        'type',
        'second_type',
        'createBy_type',
        'createBy_id',
        'updateBy_type',
        'updateBy_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function mediaable()
    {
        return $this->morphTo();
    }
}
