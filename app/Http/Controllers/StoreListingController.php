<?php

namespace App\Http\Controllers;

use App\Models\StoreListing;
use App\Http\Requests\StoreListingRequest;
use App\Services\StoreListingService;
use App\Services\ExploreService;

class StoreListingController extends Controller
{
    public function __construct(
        private StoreListingService $storeListingService,
        private ExploreService $exploreService
    ) {}

    public function index()
    {
        $listings = $this->storeListingService->getPaginatedListings(12);
        return view('store-listings.index', compact('listings'));
    }

    public function show($id)
    {
        if ($id === 'explore') {
            return $this->explore();
        }

        $storeListing = $this->storeListingService->getListingWithDetails($id);
        return view('store-listings.show', compact('storeListing'));
    }

    public function share($id)
    {
        $storeListing = $this->storeListingService->getListingWithDetails($id);
        
        return response()->json([
            'url' => route('store-listings.show', $storeListing)
        ]);
    }

    public function create()
    {
        $games = $this->storeListingService->getAvailableGames();
        return view('store-listings.create', compact('games'));
    }

public function store(StoreListingRequest $request)
{
    try {
        $data = $request->validated();
        
        // Map form fields to expected names
        $listingData = [
            'game_id' => $data['game_id'],
            'version' => $data['version'],
            'release_date' => $data['release_date'],
            'name' => $data['name'],
            'description' => $data['description'],
            'icon' => $data['icon'],
            'screenshots' => $data['screenshots'] ?? [],
            'category' => $data['category'],
            'price' => $data['price'],
            'distribution' => $data['distribution']
        ];

        $result = $this->storeListingService->createListing($listingData);
    } catch (\Exception $e) {
        return redirect()->back()
            ->withInput()
            ->with('status', [
                'type' => 'error',
                'message' => 'An error occurred while creating the listing: ' . $e->getMessage()
            ]);
    }

    if ($request->wantsJson()) {
        return response()->json([
            'success' => $result['success'],
            'message' => $result['message'],
            'data' => $result['storeListing'] ?? null
        ], $result['success'] ? 201 : 500);
    }

    if (!$result['success']) {
        return redirect()->back()
            ->withInput()
            ->with('status', [
                'type' => 'error',
                'message' => $result['message']
            ]);
    }

    return redirect()->route('store-listings.show', $result['storeListing'])
        ->with('status', [
            'type' => 'success',
            'message' => 'Store listing created successfully!'
        ]);
    }

    public function edit($id)
    {
        $storeListing = $this->storeListingService->getListingWithDetails($id);
        return view('store-listings.edit', compact('storeListing'));
    }

    public function update(StoreListingRequest $request, $id)
    {
        $storeListing = $this->storeListingService->getListingWithDetails($id);
        $validated = $request->validated();

        $result = $this->storeListingService->updateListing($id, [
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

    public function publish($id)
    {
        $storeListing = $this->storeListingService->getListingWithDetails($id);
        $result = $this->storeListingService->publishListing($id);

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


    public function explore()
    {
        $listings = $this->exploreService->getPublishedListings();
        return view('store-listings.explore', compact('listings'));
    }
}
