<?php

namespace App\Services;

use App\Repositories\StoreListingRepositoryInterface;
use App\Jobs\ProcessGameSubmission;
use Illuminate\Support\Facades\Log;
use App\Services\StoreListing\Exceptions\StoreListingException;
use App\Services\StoreListing\Support\StoreListingSupport;
use App\Services\StoreListing\DTOs\StoreListingDTO;

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

    public function getListing(string $id): StoreListingDTO
    {
        try {
            $listing = $this->storeListingRepository->get($id);
            $gameData = $listing->game ? [
                'id' => $listing->game->id,
                'name' => $listing->game->name,
                'category' => $listing->game->category,
                'description' => $listing->game->description
            ] : null;

            $dtoData = StoreListingSupport::prepareDTOData([
                'title' => $listing->name,
                'description' => $listing->description,
                'version' => $listing->version,
                'size' => $listing->size,
                'age_rating' => $listing->age_rating,
                'screenshots' => $listing->screenshots,
                'system_requirements' => $listing->system_requirements,
                'developer_info' => [
                    'name' => $listing->developer,
                    'contact' => $listing->developer_contact
                ],
                'features' => $listing->features ?? [],
                'game' => $gameData,
                'icon_url' => $listing->icon,
                'average_rating' => $listing->average_rating,
                'reviews_count' => $listing->reviews_count
            ]);
            
            // Convert platforms string to array
            $platforms = $listing->platforms ? explode(',', $listing->platforms) : [];
            
            return new StoreListingDTO(
                $dtoData['title'],
                $dtoData['description'],
                $dtoData['version'],
                $dtoData['size'],
                $dtoData['age_rating'],
                $dtoData['screenshots'],
                $dtoData['systemRequirements'],
                $dtoData['developerInfo'],
                $platforms,
                $dtoData['icon_url'],
                $dtoData['features'],
                $dtoData['game'],
                $listing->id
            );
        } catch (\Exception $e) {
            throw new StoreListingException('Failed to get store listing: ' . $e->getMessage());
        }
    }

    public function getListingWithDetails($id)
    {
        return $this->storeListingRepository->getWithDetails($id);
    }

    public function getAvailableGames()
    {
        return $this->storeListingRepository->getAvailableGames();
    }

    public function getPaginatedListings(int $perPage)
    {
        return $this->storeListingRepository->paginate($perPage);
    }
}
