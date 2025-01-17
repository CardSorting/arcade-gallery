@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-6">Create New Store Listing</h1>

                <form id="store-listing-form" action="{{ route('store-listings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="validation-errors" class="hidden mb-4 p-4 bg-red-50 border border-red-200 text-red-600 rounded"></div>

                    <!-- Game Selection -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">Select Game</h2>
                        
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <x-input-label for="game_id" :value="__('Game')" />
                                <select id="game_id" name="game_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                    <option value="">Select a game</option>
                                    @foreach($games as $game)
                                        <option value="{{ $game->id }}">{{ $game->title }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('game_id')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <!-- App Information -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">Listing Details</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Version -->
                            <div>
                                <x-input-label for="version" :value="__('Version')" />
                                <x-text-input id="version" name="version" type="text" class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->get('version')" class="mt-2" />
                            </div>

                            <!-- App Name -->
                            <div>
                                <x-input-label for="name" :value="__('App Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Release Date -->
                            <div>
                                <x-input-label for="release_date" :value="__('Release Date')" />
                                <x-text-input id="release_date" name="release_date" type="date" class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->get('release_date')" class="mt-2" />
                            </div>

                            <!-- Category -->
                            <div>
                                <x-input-label for="category" :value="__('Category')" />
                                <select id="category" name="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                    <option value="">Select a category</option>
                                    <option value="action">Action</option>
                                    <option value="adventure">Adventure</option>
                                    <option value="puzzle">Puzzle</option>
                                    <option value="strategy">Strategy</option>
                                    <option value="other">Other</option>
                                </select>
                                <x-input-error :messages="$errors->get('category')" class="mt-2" />
                            </div>

                            <!-- Description -->
                            <div class="col-span-full">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required></textarea>
                                <p class="mt-1 text-sm text-gray-500">Minimum 100 characters required</p>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <!-- Media Uploads -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">Media</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Icon -->
                            <div>
                                <x-input-label for="icon" :value="__('App Icon')" />
                                <input type="file" id="icon" name="icon" accept="image/png, image/jpeg" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" required>
                                <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                                <p class="mt-1 text-sm text-gray-500">PNG or JPG (512x512 recommended)</p>
                            </div>

                            <!-- Screenshots -->
                            <div>
                                <x-input-label for="screenshots" :value="__('Screenshots')" />
                                <input type="file" id="screenshots" name="screenshots[]" multiple accept="image/png, image/jpeg" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                <x-input-error :messages="$errors->get('screenshots')" class="mt-2" />
                                <p class="mt-1 text-sm text-gray-500">Up to 5 screenshots (PNG or JPG)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing & Distribution -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">Pricing & Distribution</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Price -->
                            <div>
                                <x-input-label for="price" :value="__('Price')" />
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">$</span>
                                    </div>
                                    <input type="number" name="price" id="price" min="0" step="0.01" class="block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="0.00" required>
                                </div>
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>

                            <!-- Distribution -->
                            <div>
                                <x-input-label for="distribution" :value="__('Distribution')" />
                                <select id="distribution" name="distribution" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                    <option value="free">Free</option>
                                    <option value="paid">Paid</option>
                                </select>
                                <x-input-error :messages="$errors->get('distribution')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="flex justify-end">
                        <x-primary-button>
                            {{ __('Submit Listing') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/store-listing-validation.js') }}"></script>
@endpush
