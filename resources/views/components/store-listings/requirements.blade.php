@props(['storeListing'])

<div class="space-y-8">
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">System Requirements</h2>
    
    @if((isset($storeListing->minimum_requirements) && count($storeListing->minimum_requirements) > 0) || 
        (isset($storeListing->recommended_requirements) && count($storeListing->recommended_requirements) > 0))
    <div class="space-y-6">
        @if(isset($storeListing->minimum_requirements) && count($storeListing->minimum_requirements) > 0)
        <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-xl">
            <div class="flex items-center justify-between cursor-pointer" x-data="{ open: true }" @click="open = !open">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Minimum Requirements
                </h3>
                <svg class="w-6 h-6 transform transition-transform duration-200" 
                     :class="{ 'rotate-180': open }" 
                     fill="none" 
                     stroke="currentColor" 
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>
            
            <div class="mt-4 space-y-3" x-show="open">
                @foreach($storeListing->minimum_requirements as $requirement)
                <div class="flex items-start gap-4">
                    @if(str_contains(strtolower($requirement), 'os'))
                    <svg class="w-6 h-6 flex-shrink-0 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                    @elseif(str_contains(strtolower($requirement), 'processor'))
                    <svg class="w-6 h-6 flex-shrink-0 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
                    </svg>
                    @elseif(str_contains(strtolower($requirement), 'memory'))
                    <svg class="w-6 h-6 flex-shrink-0 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                    </svg>
                    @else
                    <svg class="w-6 h-6 flex-shrink-0 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    @endif
                    <div class="text-base text-gray-700 dark:text-gray-300">{{ $requirement }}</div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        @if(isset($storeListing->recommended_requirements) && count($storeListing->recommended_requirements) > 0)
        <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-xl">
            <div class="flex items-center justify-between cursor-pointer" x-data="{ open: false }" @click="open = !open">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Recommended Requirements
                </h3>
                <svg class="w-6 h-6 transform transition-transform duration-200" 
                     :class="{ 'rotate-180': open }" 
                     fill="none" 
                     stroke="currentColor" 
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>
            
            <div class="mt-4 space-y-3" x-show="open">
                @foreach($storeListing->recommended_requirements as $requirement)
                <div class="flex items-start gap-4">
                    @if(str_contains(strtolower($requirement), 'os'))
                    <svg class="w-6 h-6 flex-shrink-0 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                    @elseif(str_contains(strtolower($requirement), 'processor'))
                    <svg class="w-6 h-6 flex-shrink-0 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
                    </svg>
                    @elseif(str_contains(strtolower($requirement), 'memory'))
                    <svg class="w-6 h-6 flex-shrink-0 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                    </svg>
                    @else
                    <svg class="w-6 h-6 flex-shrink-0 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    @endif
                    <div class="text-base text-gray-700 dark:text-gray-300">{{ $requirement }}</div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    @endif
</div>
