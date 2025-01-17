<?php

namespace App\Services;

use App\Models\Game;

class StoreListingService
{
    public function __construct(
        private FileStorageService $fileStorageService
    ) {}

    public function createListing(Game $game, array $data): Game
    {
        // Handle icon upload
        if (isset($data['store_icon'])) {
            $data['store_icon'] = $this->fileStorageService->storeIcon($data['store_icon']);
        }

        // Handle screenshots upload
        if (isset($data['store_screenshots'])) {
            $data['store_screenshots'] = $this->fileStorageService->storeScreenshots($data['store_screenshots']);
        }

        // Update game with store listing data
        $game->update($data);

        return $game;
    }
}
