<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable = [
        'title_en',
        'content_en',
        'title_es',
        'content_es',
    ];

    //
}
