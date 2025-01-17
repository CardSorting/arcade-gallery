<?php

namespace App\Services;

use App\Models\StoreListing;
use App\Jobs\ProcessGameSubmission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoreListingService
{
    public function __construct(
        private FileStorageService $fileStorageService
    ) {}

    public function createListing(array $data): array
    {
        try {
            DB::beginTransaction();
            
            // Handle file uploads
            $data = $this->handleFileUploads($data);
            
            // Create new store listing
            $storeListing = StoreListing::create([
                'game_id' => $data['game_id'],
                'name' => $data['name'],
                'description' => $data['description'],
                'category' => $data['category'],
                'price' => $data['price'],
                'distribution' => $data['distribution'],
                'icon' => $data['icon'] ?? null,
                'screenshots' => $data['screenshots'] ?? null
            ]);
            
            // Dispatch processing job
            ProcessGameSubmission::dispatch($storeListing);
            
            DB::commit();
            
            return [
                'success' => true,
                'storeListing' => $storeListing,
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

    public function updateListing(StoreListing $storeListing, array $data): array
    {
        try {
            DB::beginTransaction();
            
            // Handle file uploads
            $data = $this->handleFileUploads($data);
            
            // Update store listing
            $storeListing->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'category' => $data['category'],
                'price' => $data['price'],
                'distribution' => $data['distribution'],
                'icon' => $data['icon'] ?? $storeListing->icon,
                'screenshots' => $data['screenshots'] ?? $storeListing->screenshots
            ]);
            
            DB::commit();
            
            return [
                'success' => true,
                'storeListing' => $storeListing,
                'message' => 'Store listing updated successfully'
            ];
            
        } catch (\Exception $e) {
            DB::rollBack();
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
            $storeListing->update([
                'published_at' => now(),
                'is_featured' => false // Reset featured status on publish
            ]);
            
            return [
                'success' => true,
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
