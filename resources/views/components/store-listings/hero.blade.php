@props(['storeListing'])
 
<div class="bg-gradient-to-br from-blue-700 via-blue-800 to-blue-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col lg:flex-row items-start gap-8">
            <!-- App Icon Section -->
            <div class="w-32 h-32 lg:w-48 lg:h-48 bg-white/10 rounded-xl shadow-lg flex items-center justify-center">
                <img src="{{ $storeListing->icon_url }}" alt="{{ $storeListing->title }} icon" class="w-3/4 h-3/4 object-contain">
            </div>

            <div class="flex-1 space-y-6">
                <!-- Title and Rating -->
                <div class="space-y-3">
                    <h1 class="text-4xl md:text-5xl font-bold text-white tracking-tight">{{ $storeListing->title }}</h1>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2 bg-white/10 px-4 py-2 rounded-full">
                            <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="text-white font-medium text-lg">4.8</span>
                            <span class="text-white/70">(1.2k reviews)</span>
                        </div>
                        <button class="flex items-center gap-2 px-4 py-2 bg-white/10 hover:bg-white/20 rounded-full transition-colors">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            <span class="text-white">Share</span>
                        </button>
                    </div>
                </div>

                <!-- Developer Info -->
                <p class="text-lg text-white/90">By {{ $storeListing->developerInfo['name'] ?? 'Unknown Developer' }}</p>

                <!-- Stats and CTA -->
                <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
                    <!-- Stats -->
                    <div class="flex items-center gap-6 text-white/80">
                        <div class="flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            <span>1.2M+ downloads</span>
                        </div>
                        <div class="w-px h-5 bg-white/20"></div>
                        <div class="flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Version {{ $storeListing->version }}</span>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex items-center gap-4">
                        <button class="px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md transition-colors">
                            Get
                        </button>
                        <button class="px-6 py-3 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-lg shadow-md transition-colors">
                            Add to Wishlist
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
