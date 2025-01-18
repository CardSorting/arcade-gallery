@props(['storeListing'])

<div class="space-y-6">
    <h2 class="text-2xl font-bold">System Requirements</h2>
    
    @if((isset($storeListing->minimum_requirements) && count($storeListing->minimum_requirements) > 0) || 
        (isset($storeListing->recommended_requirements) && count($storeListing->recommended_requirements) > 0))
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @if(isset($storeListing->minimum_requirements) && count($storeListing->minimum_requirements) > 0)
        <div class="space-y-4">
            <h3 class="text-lg font-semibold">Minimum</h3>
            <div class="space-y-2">
                @foreach($storeListing->minimum_requirements as $requirement)
                <div class="flex items-center gap-4">
                    <svg class="w-5 h-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <div class="text-sm">{{ $requirement }}</div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        @if(isset($storeListing->recommended_requirements) && count($storeListing->recommended_requirements) > 0)
        <div class="space-y-4">
            <h3 class="text-lg font-semibold">Recommended</h3>
            <div class="space-y-2">
                @foreach($storeListing->recommended_requirements as $requirement)
                <div class="flex items-center gap-4">
                    <svg class="w-5 h-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <div class="text-sm">{{ $requirement }}</div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    @endif
</div>
