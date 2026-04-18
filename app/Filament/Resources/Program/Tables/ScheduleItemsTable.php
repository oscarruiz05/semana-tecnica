<?php

namespace App\Filament\Resources\Program\Tables;

use App\Models\ScheduleItem;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ScheduleItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('day')
                    ->label('Día')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('time_start')
                    ->label('Inicio')
                    ->time('H:i')
                    ->sortable(),

                TextColumn::make('time_end')
                    ->label('Fin')
                    ->time('H:i')
                    ->placeholder('—'),

                TextColumn::make('type')
                    ->label('Tipo')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ScheduleItem::types()[$state] ?? $state)
                    ->color(fn (string $state): string => ScheduleItem::typeColors()[$state] ?? 'gray'),

                TextColumn::make('title')
                    ->label('Evento')
                    ->searchable()
                    ->limit(45),

                TextColumn::make('speaker.name')
                    ->label('Speaker')
                    ->placeholder('—')
                    ->searchable(),

                TextColumn::make('place')
                    ->label('Lugar')
                    ->placeholder('—'),
            ])
            ->filters([
                SelectFilter::make('day')
                    ->label('Día')
                    ->options(
                        fn () => \App\Models\ScheduleItem::query()
                            ->orderBy('day')
                            ->distinct()
                            ->pluck('day')
                            ->mapWithKeys(fn ($d) => [
                                $d->format('Y-m-d') => \Carbon\Carbon::parse($d)->locale('es')->isoFormat('dddd D [de] MMMM'),
                            ])
                            ->toArray()
                    )
                    ->query(fn ($query, $state) => $state['value']
                        ? $query->whereDate('day', $state['value'])
                        : $query
                    ),

                SelectFilter::make('type')
                    ->label('Tipo')
                    ->options(ScheduleItem::types()),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('day')
            ->defaultSort('time_start');
    }
}
