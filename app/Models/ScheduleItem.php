<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScheduleItem extends Model
{
    protected $fillable = [
        'title',
        'type',
        'speaker_id',
        'day',
        'time_start',
        'time_end',
        'place',
        'description',
    ];

    protected $casts = [
        'day' => 'date',
    ];

    public function speaker(): BelongsTo
    {
        return $this->belongsTo(Speaker::class);
    }

    public static function types(): array
    {
        return [
            'apertura'  => 'Apertura',
            'charla'    => 'Charla',
            'taller'    => 'Taller',
            'receso'    => 'Receso',
            'almuerzo'  => 'Almuerzo',
            'clausura'  => 'Clausura',
            'otro'      => 'Otro',
        ];
    }

    public static function typeColors(): array
    {
        return [
            'apertura'  => 'success',
            'charla'    => 'primary',
            'taller'    => 'info',
            'receso'    => 'gray',
            'almuerzo'  => 'warning',
            'clausura'  => 'success',
            'otro'      => 'gray',
        ];
    }
}
