<?php

namespace App\Filament\Resources\AboutSectionResource\Pages;

use App\Filament\Resources\AboutSectionResource;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\HandlesBase64Uploads;

class CreateAboutSection extends CreateRecord
{
    use HandlesBase64Uploads;

    protected static string $resource = AboutSectionResource::class;
}