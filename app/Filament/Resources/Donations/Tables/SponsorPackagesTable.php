<?php

namespace App\Filament\Resources\Donations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SponsorPackagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')
                    ->label('Orden')
                    ->sortable()
                    ->width('70px'),

                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state, $record): string => $record->color ?? 'gray'),

                TextColumn::make('description')
                    ->label('Descripción')
                    ->limit(60)
                    ->placeholder('Sin descripción'),

                TextColumn::make('amount')
                    ->label('Monto')
                    ->money('COP', locale: 'es_CO')
                    ->sortable(),

                IconColumn::make('active')
                    ->label('Activo')
                    ->boolean(),

                TextColumn::make('donations_count')
                    ->label('Donaciones')
                    ->counts('donations')
                    ->sortable(),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order', 'asc');
    }
}
