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

    public function get(int $id): StoreListing
    {
        $listing = StoreListing::with(['game', 'reviews'])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->find($id);
        
        if (!$listing) {
            throw new \Exception("Store listing not found");
        }
        
        // Add calculated values to the model
        $listing->average_rating = $listing->reviews_avg_rating ?? 0;
        $listing->reviews_count = $listing->reviews_count ?? 0;
        $listing->reviews_avg_rating = $listing->average_rating;
        
        return $listing;
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

    public function getWithDetails($id): ?StoreListing
    {
        return StoreListing::with('game')
            ->select([
                'id',
                'title',
                'description',
                'version',
                'size',
                'age_rating',
                'screenshots',
                'system_requirements',
                'developer_info',
                'platforms',
                'game_id'
            ])
            ->where('id', $id)
            ->first();
    }

    public function getAvailableGames()
    {
        return StoreListing::whereNull('game_id')
            ->orWhereDoesntHave('storeListings', function($query) {
                $query->whereNotNull('published_at');
            })
            ->get();
    }

    public function paginate(int $perPage)
    {
        return StoreListing::with('game')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
}
