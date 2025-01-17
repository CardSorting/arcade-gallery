<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileStorageService
{
    public function storeIcon(UploadedFile $icon): string
    {
        return $icon->store('public/store-icons');
    }

    public function storeScreenshots(array $screenshots): array
    {
        $paths = [];
        foreach ($screenshots as $screenshot) {
            $paths[] = $screenshot->store('public/store-screenshots');
        }
        return $paths;
    }
}
