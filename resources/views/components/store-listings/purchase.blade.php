@props(['storeListing'])

<div class="space-y-8">
    <!-- Price Section -->
    <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-xl">
        @if(isset($storeListing->discount) && $storeListing->discount > 0)
        <div class="flex flex-col gap-2">
            <div class="flex items-baseline gap-3">
                @if(isset($storeListing->discounted_price))
                <span class="text-4xl font-bold text-gray-900 dark:text-white">${{ $storeListing->discounted_price }}</span>
                @endif
                <span class="px-3 py-1 text-sm font-semibold text-white bg-red-600 rounded-full">-{{ $storeListing->discount }}%</span>
            </div>
            @if(isset($storeListing->price))
            <span class="text-sm text-gray-500 dark:text-gray-400 line-through">${{ $storeListing->price }}</span>
            @endif
        </div>
        @elseif(isset($storeListing->price))
        <span class="text-4xl font-bold text-gray-900 dark:text-white">${{ $storeListing->price }}</span>
        @else
        <span class="text-4xl font-bold text-gray-900 dark:text-white">Price not available</span>
        @endif
    </div>

    <!-- Purchase Actions -->
    <div class="space-y-4">
        <button type="button" 
                class="w-full flex items-center justify-center px-8 py-4 border border-transparent text-lg font-semibold rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:bg-blue-500 dark:hover:bg-blue-600">
            Add to Cart
        </button>
        
        <button type="button" 
                class="w-full flex items-center justify-center px-8 py-4 border border-gray-300 text-lg font-semibold rounded-xl text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700">
            Add to Wishlist
        </button>
    </div>

    <!-- Additional Info -->
    <div class="space-y-4 text-sm text-gray-600 dark:text-gray-300">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>Last updated: {{ $storeListing->updated_at->diffForHumans() }}</span>
        </div>
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
            </svg>
            <span>Version: {{ $storeListing->version ?? '1.0.0' }}</span>
        </div>
    </div>

    <!-- Platforms -->
    @if(isset($storeListing->platforms) && count($storeListing->platforms) > 0)
    <div class="space-y-4">
        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Available on:</h3>
        <div class="grid grid-cols-2 gap-4">
            @foreach($storeListing->platforms as $platform)
            <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <img src="{{ asset('images/platforms/' . $platform . '.svg') }}" 
                     alt="{{ ucfirst($platform) }}" 
                     class="w-8 h-8">
                <span class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ ucfirst($platform) }}</span>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
