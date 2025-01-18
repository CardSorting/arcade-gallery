@props(['storeListing'])

<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold">Reviews</h2>
        <button type="button" 
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Write a Review
        </button>
    </div>

    <div class="space-y-8">
        @if(!empty($storeListing->reviews))
            @foreach($storeListing->reviews as $review)
            <div class="space-y-4">
                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center">
                            <span class="text-gray-600">{{ strtoupper(substr($review->user->name, 0, 1)) }}</span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="font-medium">{{ $review->user->name }}</div>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                @endfor
                            </div>
                            <span>•</span>
                            <span>{{ $review->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                <div class="prose">
                    {{ $review->content }}
                </div>
            </div>
            @endforeach
        @else
            <div class="text-gray-500">No reviews yet. Be the first to write one!</div>
        @endif
    </div>
</div>
