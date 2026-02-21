<?php

namespace App\Traits;

use App\Services\ImageKitService;

trait HandlesBase64Uploads
{
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $this->processImageUpload($data);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $this->processImageUpload($data);
    }

    protected function processImageUpload(array $data): array
    {
        if (!empty($data['thumbnail_base64']) && str_starts_with($data['thumbnail_base64'], 'data:image')) {
            $uploadedUrl = app(ImageKitService::class)->uploadBase64($data['thumbnail_base64'], 'filament_uploads');
            if ($uploadedUrl) {
                $data['thumbnail'] = $uploadedUrl;
            }
        }
        
        // Hapus base64 dari array agar tidak masuk ke database
        unset($data['thumbnail_base64']);
        return $data;
    }
}