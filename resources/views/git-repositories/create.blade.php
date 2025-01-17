@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Add New Git Repository</h1>
    <form action="{{ route('git-repositories.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
            <input type="text" id="url" name="url" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
