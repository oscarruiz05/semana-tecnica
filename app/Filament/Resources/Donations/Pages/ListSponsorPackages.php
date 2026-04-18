<?php

namespace App\Filament\Resources\Donations\Pages;

use App\Filament\Resources\Donations\SponsorPackageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSponsorPackages extends ListRecords
{
    protected static string $resource = SponsorPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Nuevo paquete'),
        ];
    }
}
