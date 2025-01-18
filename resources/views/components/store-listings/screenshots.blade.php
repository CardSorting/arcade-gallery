@props(['storeListing'])

<div class="space-y-10 py-8 border-t border-gray-100 dark:border-gray-800">
    <div class="flex items-center justify-between">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
            <span class="bg-gradient-to-r from-blue-600 to-blue-400 bg-clip-text text-transparent">Screenshots</span>
        </h2>
        <button type="button" 
                class="flex items-center gap-2 px-4 py-2 rounded-lg text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-500 font-semibold transition-all hover:bg-blue-50 dark:hover:bg-blue-900/20 hover:shadow-sm active:scale-[0.98]"
                x-data
                @click="$dispatch('open-screenshot-modal', { index: 0 })">
            <span>View all</span>
            <svg class="w-6 h-6 transform transition-transform duration-300 hover:rotate-90 hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
            </svg>
        </button>
    </div>

    <!-- Mobile Carousel -->
    <div class="lg:hidden">
        <div x-data="{
            currentIndex: 0,
            totalItems: {{ count($storeListing->screenshots) }},
            next() {
                this.currentIndex = (this.currentIndex + 1) % this.totalItems;
            },
            prev() {
                this.currentIndex = (this.currentIndex - 1 + this.totalItems) % this.totalItems;
            }
        }" class="relative">
            <!-- Carousel Items -->
            <div class="overflow-hidden">
                <div class="flex transition-transform duration-300" 
                     :style="`transform: translateX(-${currentIndex * 100}%)`">
                    @foreach($storeListing->screenshots as $index => $screenshot)
                    <div class="w-full flex-shrink-0">
                        <button type="button" 
                                class="block w-full relative aspect-video rounded-lg overflow-hidden focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                @click="$dispatch('open-screenshot-modal', { index: {{ $index }} })">
                            <img src="{{ Storage::url($screenshot) }}" 
                                 alt="Screenshot {{ $index + 1 }}" 
                                 class="w-full h-full object-cover border border-gray-200 dark:border-gray-700 transform transition-all duration-300 hover:scale-[1.02] ease-[cubic-bezier(0.4,0,0.2,1)]">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/20 to-black/10 opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute inset-0 shadow-2xl opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Navigation Arrows -->
            <button type="button" 
                    class="absolute top-1/2 -left-5 transform -translate-y-1/2 bg-white/90 dark:bg-gray-800/90 hover:bg-white dark:hover:bg-gray-700 p-2.5 rounded-full shadow-lg ring-1 ring-black/5 dark:ring-white/10 transition-all hover:scale-110 hover:shadow-xl hover:ring-black/10 dark:hover:ring-white/20"
                    @click="prev">
                <svg class="w-7 h-7 text-gray-900 dark:text-gray-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                <span class="sr-only">Previous</span>
            </button>
            <button type="button" 
                    class="absolute top-1/2 -right-5 transform -translate-y-1/2 bg-white/90 dark:bg-gray-800/90 hover:bg-white dark:hover:bg-gray-700 p-2.5 rounded-full shadow-lg ring-1 ring-black/5 dark:ring-white/10 transition-all hover:scale-110 hover:shadow-xl hover:ring-black/10 dark:hover:ring-white/20"
                    @click="next">
                <svg class="w-7 h-7 text-gray-900 dark:text-gray-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </div>

    <!-- Desktop Grid -->
    <div class="hidden lg:block">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($storeListing->screenshots as $index => $screenshot)
            <button type="button" 
                    class="group relative aspect-video rounded-xl overflow-hidden focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    x-data
                    @click="$dispatch('open-screenshot-modal', { index: {{ $index }} })">
                <img src="{{ Storage::url($screenshot) }}" 
                     alt="Screenshot {{ $index + 1 }}" 
                     class="w-full h-full object-cover border border-gray-200 dark:border-gray-700 transform transition-all duration-300 group-hover:scale-[1.05] ease-[cubic-bezier(0.4,0,0.2,1)]">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/30 to-black/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="p-3 bg-black/60 rounded-full backdrop-blur-sm transform transition-transform duration-300 group-hover:scale-110">
                        <svg class="w-12 h-12 text-white transform transition-transform duration-300 group-hover:scale-125" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="absolute inset-0 shadow-[0_8px_30px_rgba(0,0,0,0.3)] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </button>
            @endforeach
        </div>
    </div>
</div>
