<?php

namespace App\Services;

use App\Models\StoreListing;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ExploreService
{
    public function getPublishedListings(int $perPage = 12): LengthAwarePaginator
    {
        return StoreListing::with(['game' => function($query) {
                $query->with('user');
            }])
            ->select('store_listings.*', 'games.version')
            ->join('games', 'games.id', '=', 'store_listings.game_id')
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->paginate($perPage);
    }
}
