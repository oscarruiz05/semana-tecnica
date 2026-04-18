<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class Settings extends Page
{
    protected string $view = 'filament.pages.settings';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog8Tooth;

    protected static ?string $navigationLabel = 'Ajustes';

    protected static ?string $title = 'Ajustes Globales';

    protected static \UnitEnum|string|null $navigationGroup = 'Sistema';

    protected static ?int $navigationSort = 99;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(Setting::current()->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Tabs::make()
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Evento STI')
                            ->icon('heroicon-o-calendar')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('event_name')
                                            ->label('Nombre del evento')
                                            ->columnSpanFull()
                                            ->placeholder('XII SEMANA TÉCNICA INTERNACIONAL DE INGENIERÍA DE PETRÓLEOS'),

                                        TextInput::make('event_edition_number')
                                            ->label('Edición (número)')
                                            ->placeholder('12'),

                                        TextInput::make('event_edition_roman')
                                            ->label('Edición (romano)')
                                            ->placeholder('XII'),

                                        TextInput::make('event_year')
                                            ->label('Año gravable')
                                            ->numeric()
                                            ->placeholder('2024'),

                                        TextInput::make('event_city')
                                            ->label('Ciudad del evento')
                                            ->placeholder('Neiva'),

                                        DatePicker::make('event_dates_from')
                                            ->label('Fecha inicio')
                                            ->displayFormat('d/m/Y'),

                                        DatePicker::make('event_dates_to')
                                            ->label('Fecha fin')
                                            ->displayFormat('d/m/Y'),
                                    ]),
                            ]),

                        Tab::make('Organización')
                            ->icon('heroicon-o-building-office')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('org_name')
                                            ->label('Nombre completo')
                                            ->columnSpanFull()
                                            ->placeholder('ASOCIACION DE INGENIEROS DE PETROLEOS EGRESADOS DE LA UNIVERSIDAD SURCOLOMBIANA'),

                                        TextInput::make('org_short_name')
                                            ->label('Nombre corto')
                                            ->placeholder('ASIPEUSCO'),

                                        TextInput::make('org_nit')
                                            ->label('NIT')
                                            ->placeholder('900.317.169-2'),

                                        TextInput::make('org_municipality')
                                            ->label('Municipio')
                                            ->placeholder('Neiva'),

                                        TextInput::make('org_control_body')
                                            ->label('Ente de control')
                                            ->placeholder('Gobernación del Huila'),

                                        TextInput::make('org_chamber_city')
                                            ->label('Ciudad Cámara de Comercio')
                                            ->placeholder('Neiva'),
                                    ]),
                            ]),

                        Tab::make('Representante Legal')
                            ->icon('heroicon-o-user-circle')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('org_rep_name')
                                            ->label('Nombre completo')
                                            ->columnSpanFull()
                                            ->placeholder('ALEJANDRO OSPINA ANGARITA'),

                                        TextInput::make('org_rep_cc')
                                            ->label('Cédula')
                                            ->placeholder('93.388.223'),

                                        TextInput::make('org_rep_cc_city')
                                            ->label('Ciudad de expedición')
                                            ->placeholder('Ibagué - Tolima'),
                                    ]),
                            ]),

                        Tab::make('Contador Público')
                            ->icon('heroicon-o-calculator')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('org_accountant_name')
                                            ->label('Nombre completo')
                                            ->columnSpanFull()
                                            ->placeholder('DOLLY XIMENA CALDERON PACHECO'),

                                        TextInput::make('org_accountant_tp')
                                            ->label('Tarjeta Profesional')
                                            ->placeholder('85004-t'),

                                        TextInput::make('org_accountant_cc')
                                            ->label('Cédula')
                                            ->placeholder('36.066.439'),
                                    ]),
                            ]),

                        Tab::make('Cuenta Bancaria')
                            ->icon('heroicon-o-banknotes')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('org_bank_name')
                                            ->label('Banco')
                                            ->placeholder('Banco de Bogotá'),

                                        TextInput::make('org_bank_account')
                                            ->label('Número de cuenta')
                                            ->placeholder('442-485710'),

                                        TextInput::make('org_account_type')
                                            ->label('Tipo de cuenta')
                                            ->placeholder('ahorros'),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    public function content(Schema $schema): Schema
    {
        return $schema->components([
            Form::make([EmbeddedSchema::make('form')])
                ->id('form')
                ->livewireSubmitHandler('save'),
        ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();
        Setting::current()->update($data);

        Notification::make()
            ->title('Ajustes guardados correctamente')
            ->success()
            ->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('Guardar ajustes')
                ->icon('heroicon-o-check')
                ->color('primary')
                ->action('save'),
        ];
    }
}
