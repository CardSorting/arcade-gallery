<?php

namespace App\Repositories;

use App\Models\StoreListing;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Support\Facades\Log;

class StoreListingRepository implements StoreListingRepositoryInterface
{
    public function __construct(
        private ConnectionInterface $db
    ) {}

    public function create(array $data): StoreListing
    {
        try {
            $this->db->beginTransaction();
            
            $storeListing = StoreListing::create($data);
            
            $this->db->commit();
            
            return $storeListing;
            
        } catch (\Exception $e) {
            $this->db->rollBack();
            Log::error('Store listing creation failed: ' . $e->getMessage());
            throw $e;
        }
    }

    public function update(StoreListing $storeListing, array $data): StoreListing
    {
        try {
            $this->db->beginTransaction();
            
            $storeListing->update($data);
            
            $this->db->commit();
            
            return $storeListing;
            
        } catch (\Exception $e) {
            $this->db->rollBack();
            Log::error('Store listing update failed: ' . $e->getMessage());
            throw $e;
        }
    }

    public function publish(StoreListing $storeListing): StoreListing
    {
        return $this->update($storeListing, [
            'published_at' => now(),
            'is_featured' => false
        ]);
    }

    public function find(int $id): ?StoreListing
    {
        return StoreListing::find($id);
    }

    public function delete(StoreListing $storeListing): bool
    {
        try {
            $this->db->beginTransaction();
            
            $storeListing->delete();
            
            $this->db->commit();
            
            return true;
            
        } catch (\Exception $e) {
            $this->db->rollBack();
            Log::error('Store listing deletion failed: ' . $e->getMessage());
            throw $e;
        }
    }
}
