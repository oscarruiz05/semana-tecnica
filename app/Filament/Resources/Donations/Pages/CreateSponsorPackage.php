<?php

namespace App\Filament\Resources\Donations\Pages;

use App\Filament\Resources\Donations\SponsorPackageResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateSponsorPackage extends CreateRecord
{
    protected static string $resource = SponsorPackageResource::class;

    public function getTitle(): string
    {
        return 'Crear paquete';
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('volver')
                ->label('Volver')
                ->icon('heroicon-o-arrow-left')
                ->color('gray')
                ->url(SponsorPackageResource::getUrl('index')),
        ];
    }
}
