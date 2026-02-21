<?php

namespace App\Services;

use ImageKit\ImageKit;
use Exception;

class ImageKitService
{
    protected $imageKit;

    public function __construct()
    {
        $this->imageKit = new ImageKit(
            env('IMAGEKIT_PUBLIC_KEY'),
            env('IMAGEKIT_PRIVATE_KEY'),
            env('IMAGEKIT_URL_ENDPOINT')
        );
    }

    public function uploadBase64(?string $base64String, string $folder = '/')
    {
        if (!$base64String || !str_starts_with($base64String, 'data:image')) {
            return null;
        }

        try {
            $response = $this->imageKit->uploadFile([
                'file' => $base64String,
                'fileName' => uniqid('img_') . '.jpg',
                'folder' => $folder,
            ]);

            return $response->result->url; // Mengembalikan URL dari ImageKit
        } catch (Exception $e) {
            // Handle error, opsional bisa di-log
            return null;
        }
    }
}