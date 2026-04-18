<?php

namespace App\Filament\Resources\Program\Pages;

use App\Filament\Resources\Program\ScheduleItemResource;
use App\Filament\Widgets\ScheduleCalendarWidget;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\EmbeddedTable;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class ListScheduleItems extends ListRecords
{
    protected static string $resource = ScheduleItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Nuevo evento'),
        ];
    }

    public function content(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make()
                ->tabs([
                    Tab::make('Lista')
                        ->icon('heroicon-o-list-bullet')
                        ->schema([
                            EmbeddedTable::make(),
                        ]),

                    Tab::make('Calendario')
                        ->icon('heroicon-o-calendar-days')
                        ->schema(
                            $this->getWidgetsSchemaComponents([
                                ScheduleCalendarWidget::class,
                            ])
                        ),
                ]),
        ]);
    }
}
