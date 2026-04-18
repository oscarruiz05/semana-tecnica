<?php

namespace App\Filament\Resources\Speakers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SpeakersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Foto')
                    ->disk('public')
                    ->circular()
                    ->defaultImageUrl(fn () => 'https://ui-avatars.com/api/?background=random&name=Speaker'),

                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('profession')
                    ->label('Profesión')
                    ->searchable()
                    ->limit(40),

                TextColumn::make('talk_title')
                    ->label('Charla / Curso')
                    ->searchable()
                    ->limit(45),

                TextColumn::make('day')
                    ->label('Día')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('time')
                    ->label('Hora')
                    ->time('H:i')
                    ->sortable(),

                TextColumn::make('place')
                    ->label('Lugar'),
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
            ->defaultSort('day')
            ->defaultSort('time');
    }
}
