<?php

namespace App\Http\Controllers;

use App\Models\StoreListing;
use App\Http\Requests\StoreListingRequest;
use App\Services\StoreListingService;

class StoreListingController extends Controller
{
    public function __construct(
        private StoreListingService $storeListingService
    ) {}

    public function index()
    {
        $listings = StoreListing::with(['game', 'game.user'])
            ->latest()
            ->paginate(12);

        return view('store-listings.index', compact('listings'));
    }

    public function create()
    {
        // Get games that don't already have a store listing
        $games = \App\Models\Game::whereDoesntHave('storeListing')
            ->where('status', 'approved')
            ->get();
            
        return view('store-listings.create', compact('games'));
    }

    public function store(StoreListingRequest $request)
    {
        $data = $request->validated();
        
        $result = $this->storeListingService->createListing($data);
        
        return response()->json([
            'success' => $result['success'],
            'message' => $result['message'],
            'data' => $result['storeListing'] ?? null
        ], $result['success'] ? 201 : 500);
    }

    public function edit(StoreListing $storeListing)
    {
        $this->authorize('update', $storeListing);
        
        return view('store-listings.edit', compact('storeListing'));
    }

    public function update(StoreListingRequest $request, StoreListing $storeListing)
    {
        $this->authorize('update', $storeListing);
        
        $validated = $request->validated();
        
        $result = $this->storeListingService->updateListing($storeListing, [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'icon' => $validated['icon'],
            'screenshots' => $validated['screenshots'] ?? [],
            'category' => $validated['category'],
            'price' => $validated['price'],
            'distribution' => $validated['distribution']
        ]);
        
        if (!$result['success']) {
            return redirect()->back()
                ->withInput()
                ->with('status', [
                    'type' => 'error',
                    'message' => $result['message']
                ]);
        }

        return redirect()->route('store-listings.show', $storeListing)
            ->with('status', [
                'type' => 'success',
                'message' => 'Store listing updated successfully!'
            ]);
    }

    public function publish(StoreListing $storeListing)
    {
        $this->authorize('update', $storeListing);
        
        $result = $this->storeListingService->publishListing($storeListing);
        
        if (!$result['success']) {
            return redirect()->back()
                ->with('status', [
                    'type' => 'error',
                    'message' => $result['message']
                ]);
        }

        return redirect()->route('store-listings.show', $storeListing)
            ->with('status', [
                'type' => 'success',
                'message' => 'Store listing published successfully!'
            ]);
    }
}
