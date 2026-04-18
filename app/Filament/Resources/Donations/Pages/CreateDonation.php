<?php

namespace App\Filament\Resources\Donations\Pages;

use App\Filament\Resources\Donations\DonationResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateDonation extends CreateRecord
{
    protected static string $resource = DonationResource::class;

    public function getTitle(): string
    {
        return 'Nueva donación';
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('volver')
                ->label('Volver')
                ->icon('heroicon-o-arrow-left')
                ->color('gray')
                ->url(DonationResource::getUrl('index')),
        ];
    }
}
