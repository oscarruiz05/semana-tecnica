<?php

namespace App\Filament\Resources\Donations\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DonationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Documento')
                    ->columns(2)
                    ->schema([
                        TextInput::make('document_number')
                            ->label('No. Documento')
                            ->required()
                            ->placeholder('03'),

                        DatePicker::make('donation_date')
                            ->label('Fecha de donación')
                            ->required()
                            ->displayFormat('d/m/Y')
                            ->default(now()),
                    ]),

                Section::make('Empresa Donante')
                    ->columns(2)
                    ->schema([
                        TextInput::make('company_name')
                            ->label('Razón social')
                            ->required()
                            ->columnSpanFull()
                            ->placeholder('GUACAMAYA ENERGY SERVICES SAS'),

                        TextInput::make('company_nit')
                            ->label('NIT')
                            ->required()
                            ->placeholder('9004079877'),

                        TextInput::make('company_economic_activity')
                            ->label('Actividad económica')
                            ->placeholder('0910'),

                        TextInput::make('company_address')
                            ->label('Dirección')
                            ->placeholder('Cl 106 #57-23 oficina 307'),

                        TextInput::make('company_city')
                            ->label('Ciudad')
                            ->placeholder('Bogota DC'),

                        TextInput::make('company_email')
                            ->label('Correo electrónico')
                            ->email()
                            ->placeholder('contacto@empresa.com'),

                        TextInput::make('company_phone')
                            ->label('Teléfono')
                            ->tel()
                            ->placeholder('6012260014'),
                    ]),

                Section::make('Donación')
                    ->columns(2)
                    ->schema([
                        TextInput::make('amount')
                            ->label('Valor (COP)')
                            ->required()
                            ->numeric()
                            ->prefix('$')
                            ->minValue(1)
                            ->placeholder('3000000'),

                        Select::make('sponsor_package')
                            ->label('Paquete sponsor')
                            ->required()
                            ->options([
                                'BASIC SPONSOR'    => 'Basic Sponsor',
                                'SILVER SPONSOR'   => 'Silver Sponsor',
                                'GOLD SPONSOR'     => 'Gold Sponsor',
                                'PLATINUM SPONSOR' => 'Platinum Sponsor',
                                'DIAMOND SPONSOR'  => 'Diamond Sponsor',
                            ]),
                    ]),

                Section::make('Firmante del Documento Soporte')
                    ->columns(2)
                    ->schema([
                        TextInput::make('signer_name')
                            ->label('Nombre')
                            ->required()
                            ->columnSpanFull()
                            ->placeholder('Karen Ramirez'),

                        TextInput::make('signer_role')
                            ->label('Cargo')
                            ->placeholder('Organizadora Presupuestal'),

                        TextInput::make('signer_cc')
                            ->label('Cédula')
                            ->placeholder('1006069686'),
                    ]),
            ]);
    }
}
