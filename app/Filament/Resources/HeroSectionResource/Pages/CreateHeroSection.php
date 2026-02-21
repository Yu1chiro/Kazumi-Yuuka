<?php

namespace App\Filament\Resources\HeroSectionResource\Pages;

use App\Filament\Resources\HeroSectionResource;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\HandlesBase64Uploads;

class CreateHeroSection extends CreateRecord
{
    use HandlesBase64Uploads;

    protected static string $resource = HeroSectionResource::class;
}