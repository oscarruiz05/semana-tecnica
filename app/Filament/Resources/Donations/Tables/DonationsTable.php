<?php

namespace App\Filament\Resources\Donations\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DonationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('document_number')
                    ->label('No.')
                    ->sortable()
                    ->width('60px'),

                TextColumn::make('company_name')
                    ->label('Empresa')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('company_nit')
                    ->label('NIT')
                    ->searchable(),

                TextColumn::make('amount')
                    ->label('Valor')
                    ->money('COP', locale: 'es_CO')
                    ->sortable(),

                TextColumn::make('sponsor_package')
                    ->label('Paquete')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'BASIC SPONSOR'    => 'gray',
                        'SILVER SPONSOR'   => 'info',
                        'GOLD SPONSOR'     => 'warning',
                        'PLATINUM SPONSOR' => 'success',
                        'DIAMOND SPONSOR'  => 'danger',
                        default            => 'gray',
                    }),

                TextColumn::make('donation_date')
                    ->label('Fecha')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('config.event_edition_roman')
                    ->label('STI')
                    ->badge()
                    ->color('primary'),
            ])
            ->filters([])
            ->recordActions([
                Action::make('ver_pdfs')
                    ->label('Ver PDFs')
                    ->icon('heroicon-o-document-text')
                    ->color('success')
                    ->url(fn ($record) => route('donaciones.preview', $record))
                    ->openUrlInNewTab(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('donation_date', 'desc');
    }
}
