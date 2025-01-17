@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-8">
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">Store Listings</h1>
                    <a href="{{ route('store-listings.create') }}" 
                       class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition-all duration-200 transform hover:scale-105 hover:shadow-lg">
                        Create Listing
                    </a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($listings as $listing)
                        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <a href="{{ route('store-listings.show', $listing) }}" class="block">
                                @if($listing->icon)
                                    <div class="relative h-56 overflow-hidden">
                                        <img src="{{ $listing->icon }}" 
                                             alt="{{ $listing->name }} icon" 
                                             class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                                    </div>
                                @endif
                                
                                <div class="p-6">
                                    <h2 class="text-2xl font-bold text-gray-900 mb-3 line-clamp-1">
                                        {{ $listing->name }}
                                    </h2>
                                    
                                    <p class="text-gray-600 mb-4 line-clamp-2">
                                        {{ $listing->description }}
                                    </p>
                                    
                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                        <div class="bg-gray-50 p-3 rounded-lg">
                                            <span class="block text-sm text-gray-500">Rating</span>
                                            <span class="font-semibold text-gray-900">N/A</span>
                                        </div>
                                        <div class="bg-gray-50 p-3 rounded-lg">
                                            <span class="block text-sm text-gray-500">Price</span>
                                            <span class="font-semibold text-gray-900">${{ $listing->price }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="flex justify-between items-center text-sm text-gray-600">
                                        <div>
                                            <span class="block text-gray-500">Developer</span>
                                            <span class="font-medium">{{ $listing->developer ?? 'N/A' }}</span>
                                        </div>
                                        <button onclick="shareListing({{ $listing->id }})"
                                                class="flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition-colors duration-200"
                                                title="Share this listing">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                            </svg>
                                            <span>Share</span>
                                        </button>
                                    </div>
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
