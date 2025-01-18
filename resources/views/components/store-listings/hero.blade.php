@props(['storeListing'])
 
<div class="bg-gradient-to-r from-blue-600 to-blue-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="flex flex-col lg:flex-row items-start gap-8">
            <div class="space-y-4">
                <div class="flex items-center gap-4">
                    <h1 class="text-4xl md:text-5xl font-bold text-white">{{ $storeListing->title }}</h1>
                    <div class="flex items-center gap-2 bg-white/10 px-3 py-1 rounded-full">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-white font-medium">4.8</span>
                        <span class="text-white/70">(1.2k reviews)</span>
                    </div>
                </div>
                <p class="text-lg text-white/90">By {{ $storeListing->developerInfo['name'] ?? 'Unknown Developer' }}</p>
                <div class="flex items-center gap-4 text-white/80">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        <span>1.2M+ downloads</span>
                    </div>
                    <div class="w-px h-5 bg-white/20"></div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Version {{ $storeListing->version }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
