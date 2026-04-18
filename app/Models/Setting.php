<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'event_name',
        'event_edition_number',
        'event_edition_roman',
        'event_year',
        'event_dates_from',
        'event_dates_to',
        'event_city',
        'org_name',
        'org_short_name',
        'org_nit',
        'org_municipality',
        'org_control_body',
        'org_chamber_city',
        'org_rep_name',
        'org_rep_cc',
        'org_rep_cc_city',
        'org_accountant_name',
        'org_accountant_tp',
        'org_accountant_cc',
        'org_bank_name',
        'org_bank_account',
        'org_account_type',
    ];

    protected $casts = [
        'event_dates_from' => 'date',
        'event_dates_to'   => 'date',
    ];

    public static function current(): static
    {
        return static::firstOrCreate(['id' => 1]);
    }

    public function getEventDateRangeAttribute(): string
    {
        if (! $this->event_dates_from || ! $this->event_dates_to) {
            return '';
        }

        return $this->event_dates_from->format('d') . ' al ' .
            $this->event_dates_to->locale('es')->isoFormat('D [de] MMMM') . ' del ' .
            $this->event_year;
    }
}
