@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Main Content -->
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold mb-4">{{ $game->title }}</h1>
                        
                        @if($game->store_icon)
                        <div class="mb-6">
                            <img src="{{ Storage::url($game->store_icon) }}" 
                                 alt="{{ $game->title }} icon" 
                                 class="w-32 h-32 rounded-lg">
                        </div>
                        @endif

                        <div class="prose max-w-none mb-8">
                            {!! nl2br(e($game->store_description)) !!}
                        </div>

                        @if($game->store_screenshots)
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
                            @foreach($game->store_screenshots as $screenshot)
                            <div class="border rounded-lg overflow-hidden">
                                <img src="{{ Storage::url($screenshot) }}" 
                                     alt="Screenshot" 
                                     class="w-full h-48 object-cover">
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <!-- Sidebar -->
                    <div class="w-full md:w-80">
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-lg font-semibold mb-4">Details</h2>
                            
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm text-gray-500">Version</p>
                                    <p>{{ $game->store_version ?? '1.0.0' }}</p>
                                </div>
                                
                                <div>
                                    <p class="text-sm text-gray-500">Release Date</p>
                                    <p>{{ $game->store_release_date ? $game->store_release_date->format('M d, Y') : 'Coming Soon' }}</p>
                                </div>
                                
                                <div>
                                    <p class="text-sm text-gray-500">Developer</p>
                                    <p>{{ $game->user->name }}</p>
                                </div>
                            </div>

                            <div class="mt-6 space-y-2">
                                <a href="{{ route('games.play', $game) }}" 
                                   class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors block text-center">
                                    Play Now
                                </a>
                                
                                @can('update', $game)
                                <a href="{{ route('store-listings.edit', $game) }}" 
                                   class="w-full bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition-colors block text-center">
                                    Edit Listing
                                </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
