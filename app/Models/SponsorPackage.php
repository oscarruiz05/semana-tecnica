<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SponsorPackage extends Model
{
    protected $fillable = [
        'name',
        'description',
        'amount',
        'color',
        'order',
        'active',
    ];

    protected $casts = [
        'amount' => 'integer',
        'order'  => 'integer',
        'active' => 'boolean',
    ];

    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }
}
