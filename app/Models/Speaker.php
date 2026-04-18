<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $fillable = [
        'name',
        'profession',
        'image',
        'talk_title',
        'description',
        'day',
        'place',
        'time',
    ];

    protected $casts = [
        'day' => 'date',
    ];
}
