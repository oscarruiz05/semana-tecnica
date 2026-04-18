<?php

namespace App\Filament\Resources\Donations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SponsorPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre del paquete')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull()
                    ->placeholder('DIAMOND SPONSOR'),

                Textarea::make('description')
                    ->label('Descripción / beneficios')
                    ->rows(3)
                    ->columnSpanFull(),

                TextInput::make('amount')
                    ->label('Monto (COP)')
                    ->required()
                    ->numeric()
                    ->prefix('$')
                    ->suffix('COP')
                    ->minValue(0),

                Select::make('color')
                    ->label('Color del badge')
                    ->required()
                    ->options([
                        'gray'    => 'Gris',
                        'info'    => 'Azul',
                        'warning' => 'Amarillo',
                        'success' => 'Verde',
                        'danger'  => 'Rojo',
                        'primary' => 'Primario',
                    ])
                    ->default('gray'),

                TextInput::make('order')
                    ->label('Orden')
                    ->numeric()
                    ->default(0)
                    ->minValue(0),

                Toggle::make('active')
                    ->label('Activo')
                    ->default(true),
            ]);
    }
}
