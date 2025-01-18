@props(['storeListing'])

<div class="space-y-6">
    <div class="flex items-center gap-4">
        @if(isset($storeListing->discount) && $storeListing->discount > 0)
        <div class="flex items-baseline gap-2">
            @if(isset($storeListing->discounted_price))
            <span class="text-3xl font-bold text-gray-900">${{ $storeListing->discounted_price }}</span>
            @endif
            @if(isset($storeListing->price))
            <span class="text-sm text-gray-500 line-through">${{ $storeListing->price }}</span>
            @endif
            <span class="px-2 py-1 text-sm font-semibold text-white bg-red-600 rounded-full">-{{ $storeListing->discount }}%</span>
        </div>
        @elseif(isset($storeListing->price))
        <span class="text-3xl font-bold text-gray-900">${{ $storeListing->price }}</span>
        @else
        <span class="text-3xl font-bold text-gray-900">Price not available</span>
        @endif
    </div>

    <button type="button" 
            class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        Add to Cart
    </button>

    @if(isset($storeListing->platforms) && count($storeListing->platforms) > 0)
    <div class="space-y-4">
        <h3 class="text-sm font-medium text-gray-500">Available on:</h3>
        <div class="flex items-center gap-4">
            @foreach($storeListing->platforms as $platform)
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/platforms/' . $platform . '.svg') }}" 
                     alt="{{ ucfirst($platform) }}" 
                     class="w-6 h-6">
                <span class="text-sm">{{ ucfirst($platform) }}</span>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
