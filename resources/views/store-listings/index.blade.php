@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-4">Store Listings</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($games as $game)
                        <div class="border rounded-lg overflow-hidden shadow hover:shadow-lg transition-shadow">
                            <a href="{{ route('store-listings.show', $game) }}" class="block">
                                @if($game->store_icon)
                                    <img src="{{ Storage::url($game->store_icon) }}" 
                                         alt="{{ $game->store_title }} icon" 
                                         class="w-full h-48 object-cover">
                                @endif
                                <div class="p-4">
                                    <h2 class="text-xl font-semibold mb-2">{{ $game->store_title }}</h2>
                                    <p class="text-gray-600">{{ Str::limit($game->store_description, 100) }}</p>
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
