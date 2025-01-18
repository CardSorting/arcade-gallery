@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="flex flex-col lg:flex-row items-start gap-12">
            <!-- App Icon Section -->
            <div class="w-40 h-40 lg:w-56 lg:h-56 bg-white/10 backdrop-blur-sm rounded-2xl shadow-2xl flex items-center justify-center transform transition-all hover:scale-105 hover:shadow-3xl">
                <img src="{{ $storeListing->icon_url }}" alt="{{ $storeListing->title }} icon" class="w-4/5 h-4/5 object-contain transition-transform hover:scale-110">
            </div>

            <div class="flex-1 space-y-6">
                <!-- Title and Rating -->
                <div class="space-y-3">
                <h1 class="text-5xl md:text-6xl font-bold text-white tracking-tighter bg-gradient-to-r from-white to-white/80 bg-clip-text text-transparent">{{ $storeListing->title }}</h1>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2 bg-white/10 backdrop-blur-sm px-6 py-3 rounded-xl border border-white/20">
                        <svg class="w-7 h-7 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <div class="flex flex-col">
                            <span class="text-white font-bold text-xl">4.8</span>
                            <span class="text-white/80 text-sm">(1.2k reviews)</span>
                        </div>
                    </div>
                </div>
                </div>

                <!-- Developer Info -->
                <p class="text-lg text-white/90 font-medium">By {{ $storeListing->developerInfo['name'] ?? 'Unknown Developer' }}</p>

                <!-- Stats and CTA -->
                <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
                    <!-- Stats -->
                    <div class="flex items-center gap-8 text-white/90">
                        <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm px-6 py-3 rounded-xl border border-white/20">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            <div class="flex flex-col">
                                <span class="font-bold text-xl">1.2M+</span>
                                <span class="text-sm">Downloads</span>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm px-6 py-3 rounded-xl border border-white/20">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div class="flex flex-col">
                                <span class="font-bold text-xl">v{{ $storeListing->version }}</span>
                                <span class="text-sm">Version</span>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex items-center gap-4">
                        <button class="px-8 py-4 bg-gradient-to-r from-green-400 to-green-500 hover:from-green-500 hover:to-green-600 text-white font-bold rounded-xl shadow-2xl hover:shadow-3xl transition-all transform hover:scale-105">
                            Play Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
