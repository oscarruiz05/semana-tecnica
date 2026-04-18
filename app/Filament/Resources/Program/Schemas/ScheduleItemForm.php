<?php

namespace App\Filament\Resources\Program\Schemas;

use App\Models\ScheduleItem;
use App\Models\Speaker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ScheduleItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Evento')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Título')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->placeholder('Apertura oficial STI 2026'),

                        Select::make('type')
                            ->label('Tipo')
                            ->required()
                            ->options(ScheduleItem::types())
                            ->default('charla')
                            ->live(),

                        Select::make('speaker_id')
                            ->label('Speaker')
                            ->options(
                                fn () => Speaker::orderBy('name')
                                    ->pluck('name', 'id')
                            )
                            ->searchable()
                            ->nullable()
                            ->placeholder('Sin speaker asignado'),
                    ]),

                Section::make('Horario y lugar')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        DatePicker::make('day')
                            ->label('Día')
                            ->required()
                            ->displayFormat('d/m/Y'),

                        TextInput::make('place')
                            ->label('Lugar')
                            ->placeholder('Auditorio principal'),

                        TimePicker::make('time_start')
                            ->label('Hora inicio')
                            ->required()
                            ->seconds(false),

                        TimePicker::make('time_end')
                            ->label('Hora fin')
                            ->seconds(false),
                    ]),

                Section::make('Descripción')
                    ->columnSpanFull()
                    ->schema([
                        Textarea::make('description')
                            ->label('')
                            ->rows(3)
                            ->columnSpanFull()
                            ->placeholder('Descripción del evento, actividad o charla...'),
                    ]),
            ]);
    }
}
