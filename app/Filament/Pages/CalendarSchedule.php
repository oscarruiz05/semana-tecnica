<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\ScheduleCalendarWidget;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class CalendarSchedule extends Page
{
    protected string $view = 'filament.pages.calendar-schedule';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendar;

    protected static ?string $navigationLabel = 'Calendario';

    protected static ?string $title = 'Calendario del Evento';

    protected static \UnitEnum|string|null $navigationGroup = 'Programa';

    protected static ?int $navigationSort = 1;

    protected static bool $shouldRegisterNavigation = false;

    public function content(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(1)
                ->schema($this->getWidgetsSchemaComponents([
                    ScheduleCalendarWidget::class,
                ])),
        ]);
    }
}
