<?php

namespace App\Filament\Resources\Program;

use App\Filament\Resources\Program\Pages\CreateScheduleItem;
use App\Filament\Resources\Program\Pages\EditScheduleItem;
use App\Filament\Resources\Program\Pages\ListScheduleItems;
use App\Filament\Resources\Program\Schemas\ScheduleItemForm;
use App\Filament\Resources\Program\Tables\ScheduleItemsTable;
use App\Models\ScheduleItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ScheduleItemResource extends Resource
{
    protected static ?string $model = ScheduleItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $label = 'Evento';

    protected static ?string $pluralLabel = 'Cronograma';

    protected static ?string $navigationLabel = 'Cronograma';

    protected static \UnitEnum|string|null $navigationGroup = 'Programa';

    protected static ?string $slug = 'programa/cronograma';

    public static function form(Schema $schema): Schema
    {
        return ScheduleItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ScheduleItemsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListScheduleItems::route('/'),
            'create' => CreateScheduleItem::route('/create'),
            'edit'   => EditScheduleItem::route('/{record}/edit'),
        ];
    }
}
