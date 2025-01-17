@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">My Git Repositories</h1>
    <a href="{{ route('git-repositories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Repository</a>
    <ul class="list-disc list-inside">
        @foreach ($repositories as $repository)
            <li class="mb-2">
                <a href="{{ route('git-repositories.show', $repository->id) }}" class="text-blue-500 hover:underline">{{ $repository->url }}</a>
                <form action="{{ route('git-repositories.destroy', $repository->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
