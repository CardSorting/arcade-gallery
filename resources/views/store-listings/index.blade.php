@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl font-bold">Store Listings</h1>
                    <a href="{{ route('store-listings.create') }}" 
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create Listing
                    </a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($listings as $listing)
                        <div class="border rounded-lg overflow-hidden shadow hover:shadow-lg transition-shadow">
                            <a href="{{ route('store-listings.show', $listing) }}" class="block">
                                @if($listing->game->store_icon)
                                    <img src="{{ Storage::url($listing->game->store_icon) }}" 
                                         alt="{{ $listing->game->store_title }} icon" 
                                         class="w-full h-48 object-cover">
                                @endif
                                <div class="p-4">
                                    <div class="flex justify-between items-center mb-2">
                                        <h2 class="text-xl font-semibold">{{ $listing->game->store_title }}</h2>
                                        <button onclick="shareListing({{ $listing->id }})" 
                                                class="text-gray-500 hover:text-blue-500 transition-colors"
                                                title="Share this listing">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <p class="text-gray-600">{{ Str::limit($listing->game->store_description, 100) }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
