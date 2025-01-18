@props(['storeListing'])

<div class="space-y-6">
    <h2 class="text-2xl font-bold">Screenshots</h2>
    
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($storeListing->screenshots as $index => $screenshot)
        <button type="button" 
                class="group relative aspect-video rounded-lg overflow-hidden focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                x-data
                @click="$dispatch('open-screenshot-modal', { index: {{ $index }} })">
            <img src="{{ Storage::url($screenshot) }}" 
                 alt="Screenshot {{ $index + 1 }}" 
                 class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-105">
            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
        </button>
        @endforeach
    </div>
</div>
