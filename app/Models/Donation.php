<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'document_number',
        'donation_date',
        'company_name',
        'company_nit',
        'company_address',
        'company_email',
        'company_phone',
        'company_city',
        'company_economic_activity',
        'amount',
        'sponsor_package',
        'signer_name',
        'signer_role',
        'signer_cc',
    ];

    protected $casts = [
        'donation_date' => 'date',
        'amount'        => 'integer',
    ];

    public function getAmountInWordsAttribute(): string
    {
        $formatter = new \NumberFormatter('es', \NumberFormatter::SPELLOUT);
        $words = ucfirst($formatter->format($this->amount));
        return $words . ' de Pesos M. CTE.';
    }

    public function getFormattedAmountAttribute(): string
    {
        return '$' . number_format($this->amount, 0, ',', '.');
    }
}
