@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white">
    <!-- Hero Section -->
    <x-store-listings.hero :storeListing="$storeListing" />

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12">
        <div class="bg-white shadow-xl rounded-t-2xl overflow-hidden">
            <div class="p-8">
                <div class="flex flex-col lg:flex-row gap-12">
                    <!-- Left Column -->
                    <div class="flex-1 space-y-12">
                        <x-store-listings.description :storeListing="$storeListing" />
                        <x-store-listings.features :storeListing="$storeListing" />
                        <x-store-listings.screenshots :storeListing="$storeListing" />
                        <x-store-listings.reviews :storeListing="$storeListing" />
                    </div>

                    <!-- Right Column -->
                    <div class="w-full lg:w-96">
                        <div class="sticky top-8 space-y-8">
                            <x-store-listings.purchase :storeListing="$storeListing" />
                            <x-store-listings.requirements :storeListing="$storeListing" />
                            
                            <!-- Developer Info Card -->
                            @if(isset($storeListing->game) && isset($storeListing->game->user))
                            <div class="bg-gray-50 rounded-xl shadow-sm border border-gray-100 p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">About the Developer</h3>
                                <div class="flex items-center gap-4">
                                    <div class="flex-shrink-0">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($storeListing->game->user->name) }}&background=random&size=64" 
                                             alt="{{ $storeListing->game->user->name }}" 
                                             class="w-12 h-12 rounded-full">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $storeListing->game->user->name }}</p>
                                        <p class="text-sm text-gray-500">Game Developer</p>
                                    </div>
                                </div>
                                <div class="mt-6 space-y-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0 p-2 bg-blue-50 rounded-lg">
                            @endif
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-700">Member since</p>
                                            <p class="text-sm text-gray-600">{{ isset($storeListing->game->user->created_at) ? $storeListing->game->user->created_at->format('M Y') : 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0 p-2 bg-blue-50 rounded-lg">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-700">Games published</p>
                                            <p class="text-sm text-gray-600">{{ isset($storeListing->game->user->games) ? $storeListing->game->user->games->count() : 0 }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0 p-2 bg-blue-50 rounded-lg">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-700">Average rating</p>
                                            <p class="text-sm text-gray-600">4.8/5.0</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0 p-2 bg-blue-50 rounded-lg">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-700">Total downloads</p>
                                            <p class="text-sm text-gray-600">1.2M+</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0 p-2 bg-blue-50 rounded-lg">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-700">Active players</p>
                                            <p class="text-sm text-gray-600">15K+</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 space-y-3">
                                    <a href="#" class="w-full flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-blue-600 hover:text-blue-700 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        View Developer Profile
                                    </a>
                                    <a href="#" class="w-full flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-700 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                        </svg>
                                        Follow Developer
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Screenshot Modal Template -->
<div x-data="{ open: false, imageSrc: '' }" 
     x-show="open" 
     x-cloak
     class="fixed inset-0 z-50 overflow-y-auto"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full"
             @click.away="open = false">
            <div class="bg-white">
                <div class="sm:flex sm:items-start">
                    <div class="text-center sm:text-left w-full">
                        <img :src="imageSrc" alt="Screenshot" class="w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('screenshotModal', () => ({
            open: false,
            imageSrc: '',
            showImage(src) {
                this.imageSrc = src;
                this.open = true;
            }
        }))
    })
</script>
@endpush
@endsection
