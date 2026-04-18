<?php

namespace App\Filament\Resources\Donations;

use App\Filament\Resources\Donations\Pages\CreateSponsorPackage;
use App\Filament\Resources\Donations\Pages\EditSponsorPackage;
use App\Filament\Resources\Donations\Pages\ListSponsorPackages;
use App\Filament\Resources\Donations\Schemas\SponsorPackageForm;
use App\Filament\Resources\Donations\Tables\SponsorPackagesTable;
use App\Models\SponsorPackage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SponsorPackageResource extends Resource
{
    protected static ?string $model = SponsorPackage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGift;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $label = 'Paquete';

    protected static ?string $pluralLabel = 'Paquetes de Donación';

    protected static ?string $navigationLabel = 'Paquetes';

    protected static \UnitEnum|string|null $navigationGroup = 'Donaciones';

    protected static ?string $slug = 'donaciones/paquetes';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return SponsorPackageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SponsorPackagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListSponsorPackages::route('/'),
            'create' => CreateSponsorPackage::route('/create'),
            'edit'   => EditSponsorPackage::route('/{record}/edit'),
        ];
    }
}
