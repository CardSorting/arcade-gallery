@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">{{ $repository->url }}</h1>
    <p class="mb-4">Games in this repository:</p>
    <ul class="list-disc list-inside">
        @foreach ($repository->games as $game)
            <li class="mb-2">
                <a href="{{ route('games.show', $game->id) }}" class="text-blue-500 hover:underline">{{ $game->title }}</a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('git-repositories.index') }}" class="text-blue-500 hover:underline">Back to Repositories</a>
</div>
@endsection
