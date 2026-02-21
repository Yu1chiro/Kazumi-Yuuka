<?php

namespace App\Filament\Resources\AboutSectionResource\Pages;

use App\Filament\Resources\AboutSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Traits\HandlesBase64Uploads;

class EditAboutSection extends EditRecord
{
    use HandlesBase64Uploads;

    protected static string $resource = AboutSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}