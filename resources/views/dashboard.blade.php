<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <a href="{{ route('games.index') }}" class="text-blue-500 hover:underline">Manage Games</a>
                        <a href="{{ route('git-repositories.index') }}" class="text-blue-500 hover:underline">Manage Repositories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
