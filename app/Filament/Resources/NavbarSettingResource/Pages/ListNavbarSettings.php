<?php

namespace App\Filament\Resources\NavbarSettingResource\Pages;

use App\Filament\Resources\NavbarSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNavbarSettings extends ListRecords
{
    protected static string $resource = NavbarSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
