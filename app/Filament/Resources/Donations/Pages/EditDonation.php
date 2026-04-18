<?php

namespace App\Filament\Resources\Donations\Pages;

use App\Filament\Resources\Donations\DonationResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDonation extends EditRecord
{
    protected static string $resource = DonationResource::class;

    public function getTitle(): string
    {
        return 'Editar donación';
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('ver_pdfs')
                ->label('Ver PDFs')
                ->icon('heroicon-o-document-text')
                ->color('success')
                ->url(fn () => route('donaciones.preview', $this->record))
                ->openUrlInNewTab(),
            Action::make('volver')
                ->label('Volver')
                ->icon('heroicon-o-arrow-left')
                ->color('gray')
                ->url(DonationResource::getUrl('index')),
            DeleteAction::make()->label('Eliminar'),
        ];
    }
}
