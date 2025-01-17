<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Explore Games
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($listings as $listing)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <a href="{{ route('store-listings.show', $listing) }}" class="block">
                            <img src="{{ $listing->icon }}" alt="{{ $listing->name }}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-lg font-semibold mb-2">{{ $listing->name }}</h3>
                                <p class="text-gray-600 text-sm mb-2">by {{ $listing->game->user->name }}</p>
                                <p class="text-gray-600 text-sm">Version {{ $listing->version }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $listings->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
