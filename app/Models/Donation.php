<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'sponsor_package_id',
        'signer_name',
        'signer_role',
        'signer_cc',
    ];

    protected $casts = [
        'donation_date'      => 'date',
        'amount'             => 'integer',
        'sponsor_package_id' => 'integer',
    ];

    public function sponsorPackage(): BelongsTo
    {
        return $this->belongsTo(SponsorPackage::class);
    }

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
