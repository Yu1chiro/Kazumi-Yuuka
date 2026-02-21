<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\HandlesBase64Uploads;

class CreateArticle extends CreateRecord
{
    use HandlesBase64Uploads;

    protected static string $resource = ArticleResource::class;
}