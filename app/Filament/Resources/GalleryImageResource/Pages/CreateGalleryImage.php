<?php

namespace App\Filament\Resources\GalleryImageResource\Pages;

use App\Filament\Resources\GalleryImageResource;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\HandlesBase64Uploads;

class CreateGalleryImage extends CreateRecord
{
    use HandlesBase64Uploads;

    protected static string $resource = GalleryImageResource::class;
}