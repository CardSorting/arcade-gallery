@props(['storeListing'])

<div class="space-y-8">
    <!-- Rating Summary -->
    <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-xl">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Reviews</h2>
                @if($storeListing->reviews_count > 0)
                    <div class="mt-2 flex items-center gap-4">
                        <div class="text-4xl font-bold text-gray-900 dark:text-white">
                            {{ number_format($storeListing->average_rating, 1) }}
                        </div>
                        <div class="space-y-1">
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                <svg class="w-6 h-6 {{ $i <= round($storeListing->average_rating) ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                @endfor
                            </div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                {{ $storeListing->reviews_count }} reviews
                            </div>
                        </div>
                    </div>
                @else
                    <div class="mt-4 text-gray-600 dark:text-gray-400">
                        No reviews yet. Be the first to review this game!
                    </div>
                @endif
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" 
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:bg-blue-500 dark:hover:bg-blue-600">
                Write a Review
            </button>
        </div>
    </div>

    <!-- Reviews List -->
    <div class="space-y-8">
        @if(!empty($storeListing->reviews))
            @foreach($storeListing->reviews as $review)
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm">
                <div class="space-y-4">
                    <!-- Review Header -->
                    <div class="flex items-center gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                <span class="text-gray-600 dark:text-gray-300 text-xl font-medium">
                                    {{ strtoupper(substr($review->user->name, 0, 1)) }}
                                </span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="font-medium text-gray-900 dark:text-white">{{ $review->user->name }}</div>
                            <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                                <div class="flex items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    @endfor
                                </div>
                                <span>•</span>
                                <span>{{ $review->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Review Content -->
                    <div class="prose dark:prose-invert max-w-none">
                        {{ $review->content }}
                    </div>

                    <!-- Helpfulness -->
                    <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                        <span>Was this review helpful?</span>
                        <button type="button" class="flex items-center gap-1 hover:text-gray-700 dark:hover:text-gray-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                            </svg>
                            <span>12</span>
                        </button>
                        <button type="button" class="flex items-center gap-1 hover:text-gray-700 dark:hover:text-gray-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018c.163 0 .326.02.485.06L17 4m0 0v9m0-9h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5"/>
                            </svg>
                            <span>2</span>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Pagination -->
            <div class="flex justify-center">
                <nav class="inline-flex space-x-2">
                    <button type="button" class="px-3 py-2 rounded-md bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600">
                        1
                    </button>
                    <button type="button" class="px-3 py-2 rounded-md text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                        2
                    </button>
                    <button type="button" class="px-3 py-2 rounded-md text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                        3
                    </button>
                    <button type="button" class="px-3 py-2 rounded-md text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                        Next
                    </button>
                </nav>
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-gray-500 dark:text-gray-400">No reviews yet. Be the first to write one!</div>
            </div>
        @endif
    </div>
</div>
