@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">My Games</h1>
    <a href="{{ route('games.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Game</a>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($games as $game)
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-xl font-semibold mb-2">{{ $game->title }}</h2>
                <p class="text-gray-700 mb-4">{{ $game->description }}</p>
                <div class="flex justify-between items-center">
                    <a href="{{ route('games.play', $game->id) }}" class="bg-green-500 text-white px-4 py-2 rounded">Play</a>
                    <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
