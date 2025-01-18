@props(['storeListing'])

<div class="space-y-8">
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">About this game</h2>
    
    <div class="relative" x-data="{ expanded: false }">
        <div class="prose max-w-none dark:prose-invert" :class="{ 'max-h-96 overflow-hidden': !expanded }">
            {!! $storeListing->description !!}
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white dark:from-gray-900 to-transparent" x-show="!expanded"></div>
        <button 
            class="mt-4 text-blue-600 dark:text-blue-400 hover:underline focus:outline-none" 
            @click="expanded = !expanded"
            x-text="expanded ? 'Show Less' : 'Read More'">
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="p-6 bg-gray-50 dark:bg-gray-800 rounded-xl">
            <div class="flex items-center gap-3 mb-2">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <div class="text-sm text-gray-500 dark:text-gray-400">Category</div>
            </div>
            <div class="font-medium text-gray-900 dark:text-white">{{ $storeListing->game['category'] ?? 'N/A' }}</div>
        </div>
        
        <div class="p-6 bg-gray-50 dark:bg-gray-800 rounded-xl">
            <div class="flex items-center gap-3 mb-2">
                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/>
                </svg>
                <div class="text-sm text-gray-500 dark:text-gray-400">Version</div>
            </div>
            <div class="font-medium text-gray-900 dark:text-white">{{ $storeListing->version }}</div>
        </div>
        
        <div class="p-6 bg-gray-50 dark:bg-gray-800 rounded-xl">
            <div class="flex items-center gap-3 mb-2">
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                </svg>
                <div class="text-sm text-gray-500 dark:text-gray-400">Size</div>
            </div>
            <div class="font-medium text-gray-900 dark:text-white">{{ $storeListing->size }} MB</div>
        </div>
        
        <div class="p-6 bg-gray-50 dark:bg-gray-800 rounded-xl">
            <div class="flex items-center gap-3 mb-2">
                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="text-sm text-gray-500 dark:text-gray-400">Age Rating</div>
            </div>
            <div class="font-medium text-gray-900 dark:text-white">{{ $storeListing->age_rating }}+</div>
        </div>
    </div>
</div>
