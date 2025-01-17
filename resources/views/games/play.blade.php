<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Playing: {{ $game->title }}
            <a href="{{ route('games.index') }}" class="float-right text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Back to Games
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <iframe 
                    src="{{ $game->url }}" 
                    class="w-full h-screen"
                    style="border: none;"
                    title="{{ $game->title }}"
                ></iframe>
            </div>
        </div>
    </div>
</x-app-layout>
