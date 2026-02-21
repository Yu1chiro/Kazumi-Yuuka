<?php

namespace App\Filament\Resources\NavbarSettingResource\Pages;

use App\Filament\Resources\NavbarSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNavbarSetting extends EditRecord
{
    protected static string $resource = NavbarSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
