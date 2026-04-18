<?php

namespace App\Filament\Resources\Donations\Schemas;

use App\Models\Donation;
use App\Models\SponsorPackage;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DonationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Documento')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('document_number')
                            ->label('No. Documento')
                            ->required()
                            ->readOnly()
                            ->default(fn () => str_pad((int) Donation::max('document_number') + 1, 2, '0', STR_PAD_LEFT))
                            ->helperText('Generado automáticamente'),

                        DatePicker::make('donation_date')
                            ->label('Fecha de donación')
                            ->required()
                            ->displayFormat('d/m/Y')
                            ->default(now()),
                    ]),

                Section::make('Empresa Donante')
                    ->columnSpanFull()
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

                        TextInput::make('company_city')
                            ->label('Ciudad')
                            ->placeholder('Bogota DC'),

                        TextInput::make('company_address')
                            ->label('Dirección')
                            ->placeholder('Cl 106 #57-23 oficina 307'),

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
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Select::make('sponsor_package_id')
                            ->label('Paquete sponsor')
                            ->required()
                            ->columnSpanFull()
                            ->options(
                                fn () => SponsorPackage::where('active', true)
                                    ->orderBy('order')
                                    ->get()
                                    ->mapWithKeys(fn ($p) => [
                                        $p->id => $p->name . ' — $' . number_format($p->amount, 0, ',', '.'),
                                    ])
                            )
                            ->live()
                            ->afterStateUpdated(function (?int $state, Set $set) {
                                if ($state) {
                                    $package = SponsorPackage::find($state);
                                    if ($package) {
                                        $set('amount', $package->amount);
                                    }
                                }
                            }),

                        TextInput::make('amount')
                            ->label('Valor (COP)')
                            ->required()
                            ->numeric()
                            ->prefix('$')
                            ->minValue(1)
                            ->placeholder('3000000')
                            ->helperText('Se completa al seleccionar el paquete'),
                    ]),

                Section::make('Firmante del Documento Soporte')
                    ->columnSpanFull()
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
