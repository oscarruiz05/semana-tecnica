<?php

namespace App\Filament\Resources\Program\Pages;

use App\Filament\Resources\Program\ScheduleItemResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateScheduleItem extends CreateRecord
{
    protected static string $resource = ScheduleItemResource::class;

    public function getTitle(): string
    {
        return 'Agregar evento';
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('volver')
                ->label('Volver')
                ->icon('heroicon-o-arrow-left')
                ->color('gray')
                ->url(ScheduleItemResource::getUrl('index')),
        ];
    }
}
