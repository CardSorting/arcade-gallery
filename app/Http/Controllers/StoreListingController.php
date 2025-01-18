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
        try {
            $listings = $this->storeListingService->getPaginatedListings(12);
            return view('store-listings.index', [
                'listings' => $listings
            ]);
        } catch (StoreListingException $e) {
            return redirect()->route('store-listings.index')
                ->with('status', [
                    'type' => 'error',
                    'message' => $e->getMessage()
                ]);
        }
    }

    public function show($id)
    {
        if ($id === 'explore') {
            return $this->explore();
        }

        try {
            $storeListing = $this->storeListingService->getListing($id);
            return view('store-listings.show', [
                'storeListing' => $storeListing
            ]);
        } catch (StoreListingException $e) {
            return redirect()->route('store-listings.index')
                ->with('status', [
                    'type' => 'error',
                    'message' => $e->getMessage()
                ]);
        }
    }

    public function share($id)
    {
        try {
            $storeListing = $this->storeListingService->getListingWithDetails($id);
            
            return response()->json([
                'success' => true,
                'url' => route('store-listings.show', $storeListing->id)
            ]);
        } catch (StoreListingException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 404);
        }
    }

    public function create()
    {
        try {
            $games = $this->storeListingService->getAvailableGames();
            return view('store-listings.create', [
                'games' => $games
            ]);
        } catch (StoreListingException $e) {
            return redirect()->route('store-listings.index')
                ->with('status', [
                    'type' => 'error',
                    'message' => $e->getMessage()
                ]);
        }
    }

public function store(StoreListingRequest $request)
{
    try {
        $data = $request->validated();
        
        $dtoData = [
            'title' => $data['name'],
            'description' => $data['description'],
            'version' => $data['version'],
            'screenshots' => $data['screenshots'] ?? [],
            'systemRequirements' => [
                'os' => $data['os_requirements'] ?? 'Unknown',
                'processor' => $data['processor_requirements'] ?? 'Unknown',
                'memory' => $data['memory_requirements'] ?? 'Unknown',
                'graphics' => $data['graphics_requirements'] ?? 'Unknown',
                'storage' => $data['storage_requirements'] ?? 'Unknown'
            ],
            'developerInfo' => [
                'name' => auth()->user()->name,
                'email' => auth()->user()->email
            ]
        ];

        $storeListing = $this->storeListingService->createListing(
            new StoreListingDTO(...$dtoData)
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $storeListing->toArray()
            ], 201);
        }

        return redirect()->route('store-listings.show', $storeListing->id)
            ->with('status', [
                'type' => 'success',
                'message' => 'Store listing created successfully!'
            ]);

    } catch (StoreListingException $e) {
        return redirect()->back()
            ->withInput()
            ->with('status', [
                'type' => 'error',
                'message' => $e->getMessage()
            ]);
    }
}

    public function edit($id)
    {
        try {
            $storeListing = $this->storeListingService->getListingWithDetails($id);
            return view('store-listings.edit', [
                'storeListing' => $storeListing->toArray()
            ]);
        } catch (StoreListingException $e) {
            return redirect()->route('store-listings.index')
                ->with('status', [
                    'type' => 'error',
                    'message' => $e->getMessage()
                ]);
        }
    }

    public function update(StoreListingRequest $request, $id)
    {
        try {
            $data = $request->validated();
            
            $dtoData = [
                'title' => $data['name'],
                'description' => $data['description'],
                'version' => $data['version'],
                'screenshots' => $data['screenshots'] ?? [],
                'systemRequirements' => [
                    'os' => $data['os_requirements'] ?? 'Unknown',
                    'processor' => $data['processor_requirements'] ?? 'Unknown',
                    'memory' => $data['memory_requirements'] ?? 'Unknown',
                    'graphics' => $data['graphics_requirements'] ?? 'Unknown',
                    'storage' => $data['storage_requirements'] ?? 'Unknown'
                ],
                'developerInfo' => [
                    'name' => auth()->user()->name,
                    'email' => auth()->user()->email
                ]
            ];

            $storeListing = $this->storeListingService->updateListing(
                $id,
                new StoreListingDTO(...$dtoData)
            );

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'data' => $storeListing->toArray()
                ]);
            }

            return redirect()->route('store-listings.show', $storeListing->id)
                ->with('status', [
                    'type' => 'success',
                    'message' => 'Store listing updated successfully!'
                ]);

        } catch (StoreListingException $e) {
            return redirect()->back()
                ->withInput()
                ->with('status', [
                    'type' => 'error',
                    'message' => $e->getMessage()
                ]);
        }
    }

    public function publish($id)
    {
        try {
            $storeListing = $this->storeListingService->publishListing($id);

            return redirect()->route('store-listings.show', $storeListing->id)
                ->with('status', [
                    'type' => 'success',
                    'message' => 'Store listing published successfully!'
                ]);

        } catch (StoreListingException $e) {
            return redirect()->back()
                ->with('status', [
                    'type' => 'error',
                    'message' => $e->getMessage()
                ]);
        }
    }


    public function explore()
    {
        try {
            $listings = $this->exploreService->getPublishedListings();
            return view('store-listings.explore', [
                'listings' => $listings
            ]);
        } catch (StoreListingException $e) {
            return redirect()->route('store-listings.index')
                ->with('status', [
                    'type' => 'error',
                    'message' => $e->getMessage()
                ]);
        }
    }
}
