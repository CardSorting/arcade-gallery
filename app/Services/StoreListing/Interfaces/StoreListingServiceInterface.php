<?php

namespace App\Services\StoreListing\Interfaces;

use App\DTOs\StoreListingDTO;
use App\Models\StoreListing;

interface StoreListingServiceInterface
{
    public function createListing(array $data): StoreListingDTO;
    public function updateListing(string $id, array $data): StoreListingDTO;
    public function deleteListing(string $id): void;
    public function getListings(): array;
    public function getListing(string $id): StoreListingDTO;
}
