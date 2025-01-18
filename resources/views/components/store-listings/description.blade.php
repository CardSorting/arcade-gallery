@props(['storeListing'])

<div class="space-y-8">
    <div class="prose max-w-none">
        {!! $storeListing->description !!}
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="p-4 bg-gray-50 rounded-lg">
            <div class="text-sm text-gray-500">Category</div>
            <div class="font-medium">{{ $storeListing->game['category'] ?? 'N/A' }}</div>
        </div>
        <div class="p-4 bg-gray-50 rounded-lg">
            <div class="text-sm text-gray-500">Version</div>
            <div class="font-medium">{{ $storeListing->version }}</div>
        </div>
        <div class="p-4 bg-gray-50 rounded-lg">
            <div class="text-sm text-gray-500">Size</div>
            <div class="font-medium">{{ $storeListing->size }} MB</div>
        </div>
        <div class="p-4 bg-gray-50 rounded-lg">
            <div class="text-sm text-gray-500">Age Rating</div>
            <div class="font-medium">{{ $storeListing->age_rating }}+</div>
        </div>
    </div>
</div>
