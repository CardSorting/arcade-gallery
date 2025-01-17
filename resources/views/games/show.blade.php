@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">{{ $game->title }}</h1>
    <p class="mb-4">{{ $game->description }}</p>
    <p class="mb-4"><a href="{{ $game->url }}" target="_blank" class="text-blue-500 hover:underline">Play Game</a></p>
    <p class="mb-4">Repository: <a href="{{ $game->gitRepository->url }}" target="_blank" class="text-blue-500 hover:underline">{{ $game->gitRepository->url }}</a></p>
    <a href="{{ route('games.index') }}" class="text-blue-500 hover:underline">Back to Games</a>
</div>
@endsection
