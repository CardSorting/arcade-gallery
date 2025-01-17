<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Jobs\ProcessGameSubmission;
use App\Http\Requests\StoreListingRequest;
use App\Services\StoreListingService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoreListingController extends Controller
{
    public function __construct(
        private StoreListingService $storeListingService
    ) {}

    public function index()
    {
        $games = Game::whereNotNull('store_description')
            ->with('user')
            ->latest()
            ->paginate(12);

        return view('store-listings.index', compact('games'));
    }

    public function show(Game $game)
    {
        $this->authorize('view', $game);
        
        $game->load('user');
        
        if (!$game->store_description) {
            return redirect()->route('games.show', $game)
                ->with('status', [
                    'type' => 'info',
                    'message' => 'This game does not have a store listing yet.'
                ]);
        }

        return view('store-listings.show', compact('game'));
    }

    public function store(StoreListingRequest $request, Game $game)
    {
        $this->authorize('update', $game);
        
        try {
            DB::beginTransaction();
            
            // Create store listing and update game status
            $this->storeListingService->createListing($game, $request->validated());
            $game->update(['status' => 'pending']);

            // Dispatch job to handle submission processing
            ProcessGameSubmission::dispatch($game);

            DB::commit();

            return redirect()->route('games.show', $game)
                ->with('status', [
                    'type' => 'success',
                    'message' => 'Store listing updated successfully! Processing will begin shortly.'
                ]);
                
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Store listing update failed: ' . $e->getMessage());
            
            return redirect()->back()
                ->withInput()
                ->with('status', [
                    'type' => 'error',
                    'message' => 'Failed to update store listing. Please try again.'
                ]);
        }
    }
}
