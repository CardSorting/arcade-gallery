<?php

namespace App\Services;

use App\Models\Game;
use App\Jobs\ProcessGameSubmission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoreListingService
{
    public function __construct(
        private FileStorageService $fileStorageService
    ) {}

    public function createListing(Game $game, array $data): array
    {
        try {
            DB::beginTransaction();
            
            // Handle file uploads
            $data = $this->handleFileUploads($data);
            
            // Update game with store listing data
            $game->update([
                'store_title' => $data['name'],
                'store_description' => $data['description'],
                'store_category' => $data['category'],
                'store_price' => $data['price'],
                'store_distribution' => $data['distribution'],
                'store_icon' => $data['store_icon'] ?? null,
                'store_screenshots' => $data['store_screenshots'] ?? null
            ]);
            
            // Update game status and dispatch processing job
            $game->update(['status' => 'pending']);
            ProcessGameSubmission::dispatch($game);
            
            DB::commit();
            
            return [
                'success' => true,
                'game' => $game,
                'message' => 'Store listing created successfully'
            ];
            
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Store listing creation failed: ' . $e->getMessage());
            
            return [
                'success' => false,
                'message' => 'Failed to create store listing: ' . $e->getMessage()
            ];
        }
    }

    protected function handleFileUploads(array $data): array
    {
        if (isset($data['icon'])) {
            $data['store_icon'] = $this->fileStorageService->storeIcon($data['icon']);
        }

        if (isset($data['screenshots'])) {
            $data['store_screenshots'] = $this->fileStorageService->storeScreenshots($data['screenshots']);
        }

        return $data;
    }
}
