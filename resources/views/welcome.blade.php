<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arcade Gallery - Game Hosting Platform</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="/">
                                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                            </a>
                        </div>
                        <div class="hidden sm:-my-px sm:ml-10 sm:flex sm:space-x-8">
                            <a href="/" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Home
                            </a>
                            <a href="/store-listings" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Games
                            </a>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Log in</a>
                            <a href="{{ route('register') }}" class="ml-4 text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <header class="bg-white">
            <div class="max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        Your Games.<br>
                        <span class="text-indigo-600">Everywhere.</span>
                    </h1>
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                        Arcade Gallery is the ultimate platform for hosting and sharing your web-based games. 
                        Reach players worldwide with our powerful hosting solution.
                    </p>
                    <div class="mt-8">
                        <a href="{{ route('register') }}" class="inline-block px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Features Section -->
        <section class="bg-gray-50 py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Features</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Everything you need to share your games
                    </p>
                </div>

                <div class="mt-10">
                    <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                        <!-- Feature 1 -->
                        <div class="relative">
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Instant Deployment</p>
                            <p class="mt-2 ml-16 text-base text-gray-500">
                                Deploy your games with a single click. No complex setup required.
                            </p>
                        </div>

                        <!-- Feature 2 -->
                        <div class="relative">
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">24/7 Availability</p>
                            <p class="mt-2 ml-16 text-base text-gray-500">
                                Your games are always online with our reliable hosting infrastructure.
                            </p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="relative">
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Analytics Dashboard</p>
                            <p class="mt-2 ml-16 text-base text-gray-500">
                                Track your game's performance with detailed player statistics.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">How It Works</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Simple steps to share your game
                    </p>
                </div>

                <div class="mt-10">
                    <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                        <!-- Step 1 -->
                        <div class="text-center">
                            <div class="flex justify-center">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                    1
                                </div>
                            </div>
                            <p class="mt-5 text-lg leading-6 font-medium text-gray-900">Upload Your Game</p>
                            <p class="mt-2 text-base text-gray-500">
                                Easily upload your game files through our web interface or API.
                            </p>
                        </div>

                        <!-- Step 2 -->
                        <div class="text-center">
                            <div class="flex justify-center">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                    2
                                </div>
                            </div>
                            <p class="mt-5 text-lg leading-6 font-medium text-gray-900">Configure Settings</p>
                            <p class="mt-2 text-base text-gray-500">
                                Set up your game details, permissions, and custom domain.
                            </p>
                        </div>

                        <!-- Step 3 -->
                        <div class="text-center">
                            <div class="flex justify-center">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                    3
                                </div>
                            </div>
                            <p class="mt-5 text-lg leading-6 font-medium text-gray-900">Share & Play</p>
                            <p class="mt-2 text-base text-gray-500">
                                Share your game link and start playing with friends instantly.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 mt-12">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="text-center text-gray-500">
                    &copy; {{ date('Y') }} Arcade Gallery. All rights reserved.
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
