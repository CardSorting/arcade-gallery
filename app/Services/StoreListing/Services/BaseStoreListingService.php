<?php

namespace App\Services\StoreListing\Services;

use App\Services\StoreListing\Interfaces\StoreListingServiceInterface;
use App\DTOs\StoreListingDTO;
use App\Models\StoreListing;
use App\Repositories\StoreListingRepositoryInterface;
use App\Services\StoreListing\Exceptions\StoreListingException;

class BaseStoreListingService implements StoreListingServiceInterface
{
    protected StoreListingRepositoryInterface $repository;

    public function __construct(StoreListingRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function createListing(array $data): StoreListingDTO
    {
        $listing = $this->repository->create($data);
        return StoreListingDTO::fromModel($listing);
    }

    public function updateListing(string $id, array $data): StoreListingDTO
    {
        $listing = $this->repository->update($id, $data);
        return StoreListingDTO::fromModel($listing);
    }

    public function deleteListing(string $id): void
    {
        $this->repository->delete($id);
    }

    public function getListings(): array
    {
        return $this->repository->all()
            ->map(fn ($listing) => StoreListingDTO::fromModel($listing))
            ->toArray();
    }

    public function getListing(string $id): StoreListingDTO
    {
        $listing = $this->repository->find($id);
        
        if (!$listing) {
            throw new StoreListingException('Store listing not found');
        }

        return StoreListingDTO::fromModel($listing);
    }
}
