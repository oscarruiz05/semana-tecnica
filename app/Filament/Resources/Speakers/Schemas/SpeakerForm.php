<?php

namespace App\Filament\Resources\Speakers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SpeakerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Ponente')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre completo')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->placeholder('Ing. Juan Carlos Pérez'),

                        TextInput::make('profession')
                            ->label('Profesión / cargo')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->placeholder('Ingeniero de Petróleos — Ecopetrol'),

                        FileUpload::make('image')
                            ->label('Foto')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('speakers')
                            ->columnSpanFull()
                            ->maxSize(2048),
                    ]),

                Section::make('Charla / Curso')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('talk_title')
                            ->label('Título de la charla')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->placeholder('Automatización de pozos en campos maduros'),

                        DatePicker::make('day')
                            ->label('Día')
                            ->required()
                            ->displayFormat('d/m/Y'),

                        TextInput::make('place')
                            ->label('Lugar')
                            ->required()
                            ->placeholder('Auditorio principal'),

                        TimePicker::make('time')
                            ->label('Hora')
                            ->required()
                            ->seconds(false),

                        Textarea::make('description')
                            ->label('Descripción')
                            ->rows(4)
                            ->columnSpanFull()
                            ->placeholder('Breve descripción del contenido de la charla o curso...'),
                    ]),
            ]);
    }
}
