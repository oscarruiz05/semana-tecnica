<?php

namespace App\Filament\Resources\Plans\Pages;

use App\Filament\Resources\Plans\PlanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPlan extends EditRecord
{
    protected static string $resource = PlanResource::class;

    public function getTitle(): string
    {
        return 'Editar plan';
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()->label('Eliminar'),
        ];
    }
}
