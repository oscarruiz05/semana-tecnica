<?php

namespace App\Filament\Resources\Program\Pages;

use App\Filament\Resources\Program\ScheduleItemResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditScheduleItem extends EditRecord
{
    protected static string $resource = ScheduleItemResource::class;

    public function getTitle(): string
    {
        return 'Editar evento';
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('volver')
                ->label('Volver')
                ->icon('heroicon-o-arrow-left')
                ->color('gray')
                ->url(ScheduleItemResource::getUrl('index')),
            DeleteAction::make()->label('Eliminar'),
        ];
    }
}
