<?php

namespace App\Filament\Resources\Donations\Pages;

use App\Filament\Resources\Donations\SponsorPackageResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSponsorPackage extends EditRecord
{
    protected static string $resource = SponsorPackageResource::class;

    public function getTitle(): string
    {
        return 'Editar paquete';
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('volver')
                ->label('Volver')
                ->icon('heroicon-o-arrow-left')
                ->color('gray')
                ->url(SponsorPackageResource::getUrl('index')),
            DeleteAction::make()->label('Eliminar'),
        ];
    }
}
