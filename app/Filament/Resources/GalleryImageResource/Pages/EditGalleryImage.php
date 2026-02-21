<?php

namespace App\Filament\Resources\GalleryImageResource\Pages;

use App\Filament\Resources\GalleryImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Traits\HandlesBase64Uploads;

class EditGalleryImage extends EditRecord
{
    use HandlesBase64Uploads;

    protected static string $resource = GalleryImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}