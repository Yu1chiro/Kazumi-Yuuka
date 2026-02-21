<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NavbarSettingResource\Pages;
use App\Models\NavbarSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class NavbarSettingResource extends Resource
{
    protected static ?string $model = NavbarSetting::class;
    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static ?string $navigationGroup = 'Landing Page';
    protected static ?string $navigationLabel = 'Navbar Links';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->required()
                ->label('Link Title (e.g., Twitter)')
                ->maxLength(255),
            TextInput::make('url')
                ->required()
                ->url()
                ->label('External URL')
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('title')->searchable(),
            TextColumn::make('url')->searchable()->limit(50),
            TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNavbarSettings::route('/'),
            'create' => Pages\CreateNavbarSetting::route('/create'),
            'edit' => Pages\EditNavbarSetting::route('/{record}/edit'),
        ];
    }
}