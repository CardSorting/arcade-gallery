@props(['storeListing'])

<div class="space-y-6">
    <h2 class="text-2xl font-bold">Features</h2>
    
    @if(!empty($storeListing->features))
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($storeListing->features as $feature)
                <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-lg">
                    <svg class="w-6 h-6 flex-shrink-0 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <div>
                        <div class="font-medium">{{ $feature->title }}</div>
                        @if(isset($feature->description))
                        <div class="text-sm text-gray-600 mt-1">{{ $feature->description }}</div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-gray-500">No features listed yet.</div>
    @endif
</div>
