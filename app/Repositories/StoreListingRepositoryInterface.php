<?php

namespace App\Repositories;

use App\Models\StoreListing;

interface StoreListingRepositoryInterface
{
    public function create(array $data): StoreListing;
    public function update(StoreListing $storeListing, array $data): StoreListing;
    public function publish(StoreListing $storeListing): StoreListing;
    public function find(int $id): ?StoreListing;
    public function delete(StoreListing $storeListing): bool;
    public function paginate(int $perPage);
    public function get(int $id): StoreListing;
}
