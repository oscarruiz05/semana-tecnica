<?php

namespace App\Filament\Resources\Plans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->label('Descripción')
                    ->rows(3)
                    ->columnSpanFull(),

                TextInput::make('price')
                    ->label('Precio (COP)')
                    ->required()
                    ->numeric()
                    ->prefix('$')
                    ->suffix('COP')
                    ->minValue(0),

                Toggle::make('active')
                    ->label('Activo')
                    ->default(true),
            ]);
    }
}
