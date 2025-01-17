<?php

namespace App\Services;

use App\Repositories\StoreListingRepositoryInterface;
use App\Jobs\ProcessGameSubmission;
use Illuminate\Support\Facades\Log;

class StoreListingService
{
    public function __construct(
        private FileStorageService $fileStorageService,
        private StoreListingRepositoryInterface $storeListingRepository
    ) {}

    public function createListing(array $data): array
    {
        try {
            // Handle file uploads
            $data = $this->handleFileUploads($data);
            
            // Create new store listing through repository
            $storeListing = $this->storeListingRepository->create([
                'game_id' => $data['game_id'],
                'version' => $data['version'],
                'release_date' => $data['release_date'],
                'name' => $data['name'],
                'description' => $data['description'],
                'category' => $data['category'],
                'price' => $data['price'],
                'distribution' => $data['distribution'],
                'icon' => $data['icon'] ?? null,
                'screenshots' => $data['screenshots'] ?? null
            ]);
            
            // Dispatch processing job with the associated game
            ProcessGameSubmission::dispatch($storeListing->game);
            
            return [
                'success' => true,
                'storeListing' => $storeListing,
                'message' => 'Store listing created successfully'
            ];
            
        } catch (\Exception $e) {
            Log::error('Store listing creation failed: ' . $e->getMessage());
            
            return [
                'success' => false,
                'message' => 'Failed to create store listing: ' . $e->getMessage()
            ];
        }
    }

    public function updateListing(StoreListing $storeListing, array $data): array
    {
        try {
            // Handle file uploads
            $data = $this->handleFileUploads($data);
            
            // Update store listing through repository
            $updatedListing = $this->storeListingRepository->update($storeListing, [
                'name' => $data['name'],
                'description' => $data['description'],
                'category' => $data['category'],
                'price' => $data['price'],
                'distribution' => $data['distribution'],
                'icon' => $data['icon'] ?? $storeListing->icon,
                'screenshots' => $data['screenshots'] ?? $storeListing->screenshots
            ]);
            
            return [
                'success' => true,
                'storeListing' => $updatedListing,
                'message' => 'Store listing updated successfully'
            ];
            
        } catch (\Exception $e) {
            Log::error('Store listing update failed: ' . $e->getMessage());
            
            return [
                'success' => false,
                'message' => 'Failed to update store listing: ' . $e->getMessage()
            ];
        }
    }

    public function publishListing(StoreListing $storeListing): array
    {
        try {
            $publishedListing = $this->storeListingRepository->publish($storeListing);
            
            return [
                'success' => true,
                'storeListing' => $publishedListing,
                'message' => 'Store listing published successfully'
            ];
            
        } catch (\Exception $e) {
            Log::error('Store listing publish failed: ' . $e->getMessage());
            
            return [
                'success' => false,
                'message' => 'Failed to publish store listing: ' . $e->getMessage()
            ];
        }
    }

    protected function handleFileUploads(array $data): array
    {
        if (isset($data['icon'])) {
            $data['icon'] = $this->fileStorageService->storeIcon($data['icon']);
        }

        if (isset($data['screenshots'])) {
            $data['screenshots'] = $this->fileStorageService->storeScreenshots($data['screenshots']);
        }

        return $data;
    }
}
