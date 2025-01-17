<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Arcade Gallery - The ultimate platform for hosting and sharing web-based games. Deploy instantly and reach players worldwide.">
    <meta name="theme-color" content="#4f46e5">
    <title>Arcade Gallery - Game Hosting Platform</title>
    <link rel="canonical" href="{{ url('/') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 antialiased">
    <!-- Skip to main content for accessibility -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-indigo-600 text-white px-4 py-2 rounded-md">
        Skip to main content
    </a>

    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm sticky top-0 z-50" aria-label="Main navigation">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="/" class="focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-md" aria-label="Home">
                                <x-application-logo class="block h-10 w-auto fill-current text-indigo-600 transition-transform hover:scale-105" />
                            </a>
                        </div>
                        <div class="hidden sm:-my-px sm:ml-10 sm:flex sm:space-x-8">
                            <a href="/" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors" aria-current="page">
                                Home
                            </a>
                            <a href="/store-listings" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors">
                                Games
                            </a>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                        @auth
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-600 bg-indigo-50 hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                Log in
                            </a>
                            <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                Register
                            </a>
                        @endauth
                    </div>
                    <!-- Mobile menu button -->
                    <div class="flex items-center sm:hidden">
                        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <main id="main-content" class="flex-grow">
            <!-- Hero Section -->
            <header class="relative bg-white overflow-hidden">
                <div class="max-w-7xl mx-auto">
                    <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:pb-28 xl:pb-32">
                        <div class="mt-16 mx-auto max-w-7xl px-4 sm:mt-24 sm:px-6">
                            <div class="text-center">
                                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                                    <span class="block">Your Games.</span>
                                    <span class="block text-indigo-600 mt-1">Everywhere.</span>
                                </h1>
                                <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-500 leading-relaxed">
                                    Arcade Gallery is the ultimate platform for hosting and sharing your web-based games. 
                                    Reach players worldwide with our powerful hosting solution.
                                </p>
                                <div class="mt-10 flex justify-center gap-4">
                                    <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all transform hover:scale-105">
                                        Get Started
                                        <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </a>
                                    <a href="/store-listings" class="inline-flex items-center px-8 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                                        Browse Games
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Features Section -->
            <section class="py-20 bg-gradient-to-b from-gray-50 to-white" aria-labelledby="features-heading">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:text-center">
                        <h2 id="features-heading" class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Features</h2>
                        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                            Everything you need to share your games
                        </p>
                    </div>

                    <div class="mt-16">
                        <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                            <!-- Feature 1 -->
                            <div class="relative group">
                                <dt>
                                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white transform transition-all group-hover:scale-110">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Instant Deployment</p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    Deploy your games with a single click. No complex setup required. Our platform handles all the technical details.
                                </dd>
                            </div>

                            <!-- Feature 2 -->
                            <div class="relative group">
                                <dt>
                                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white transform transition-all group-hover:scale-110">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">24/7 Availability</p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    Your games are always online with our reliable hosting infrastructure. Enjoy high uptime and fast loading speeds.
                                </dd>
                            </div>

                            <!-- Feature 3 -->
                            <div class="relative group">
                                <dt>
                                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white transform transition-all group-hover:scale-110">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Analytics Dashboard</p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    Track your game's performance with detailed player statistics. Gain insights to improve engagement.
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </section>

            <!-- How It Works Section -->
            <section class="py-20 bg-white" aria-labelledby="steps-heading">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:text-center">
                        <h2 id="steps-heading" class="text-base text-indigo-600 font-semibold tracking-wide uppercase">How It Works</h2>
                        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                            Simple steps to share your game
                        </p>
                    </div>

                    <div class="mt-16">
                        <div class="relative">
                            <!-- Connection line -->
                            <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-gray-200 hidden md:block"></div>
                            
                            <div class="space-y-16">
                                <!-- Step 1 -->
                                <div class="relative">
                                    <div class="relative z-10 md:flex items-center">
                                        <div class="hidden md:block w-1/2 pr-8 text-right">
                                            <div class="text-2xl font-bold text-indigo-600">1</div>
                                            <h3 class="text-xl font-medium text-gray-900">Upload Your Game</h3>
                                            <p class="mt-2 text-gray-500">
                                                Easily upload your game files through our web interface or API. Support for multiple file formats and configurations.
                                            </p>
                                        </div>
                                        <div class="mx-auto md:mx-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-500 text-white font-semibold text-lg transform transition-transform hover:scale-110">
                                            1
                                        </div>
                                        <div class="mt-4 md:mt-0 md:block md:w-1/2 md:pl-8 md:hidden">
                                            <h3 class="text-xl font-medium text-gray-900">Upload Your Game</h3>
                                            <p class="mt-2 text-gray-500">
                                                Easily upload your game files through our web interface or API. Support for multiple file formats and configurations.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 2 -->
                                <div class="relative">
                                    <div class="relative z-10 md:flex items-center">
                                        <div class="hidden md:block w-1/2 pr-8 text-right order-last">
                                            <div class="text-2xl font-bold text-indigo-600">2</div>
                                            <h3 class="text-xl font-medium text-gray-900">Configure Settings</h3>
                                            <p class="mt-2 text-gray-500">
                                                Customize your game settings, set permissions, and configure your custom domain for a professional presence.
                                            </p>
                                        </div>
                                        <div class="mx-auto md:mx-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-500 text-white font-semibold text-lg transform transition-transform hover:scale-110">
                                            2
                                        </div>
                                        <div class="mt-4 md:mt-0 md:w-1/2 md:pl-8 md:hidden">
                                            <h3 class="text-xl font-medium text-gray-900">Configure Settings</h3>
                                            <p class="mt-2 text-gray-500">
                                                Customize your game settings, set permissions, and configure your custom domain for a professional presence.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 3 -->
                                <div class="relative">
                                    <div class="relative z-10 md:flex items-center">
                                        <div class="hidden md:block w-1/2 pr-8 text-right">
                                            <div class="text-2xl font-bold text-indigo-600">3</div>
                                            <h3 class="text-xl font-medium text-gray-900">Share & Play</h3>
                                            <p class="mt-2 text-gray-500">
                                                Share your game link with players worldwide and start collecting feedback and analytics instantly.
                                            </p>
                                        </div>
                                        <div class="mx-auto md:mx-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-500 text-white font-semibold text-lg transform transition-transform hover:scale-110">
                                            3
                                        </div>
                                        <div class="mt-4 md:mt-0 md:w-1/2 md:pl-8 md:hidden">
                                            <h3 class="text-xl font-medium text-gray-900">Share & Play</h3>
                                            <p class="mt-2 text-gray-500">
                                                Share your game link with players worldwide and start collecting feedback and analytics instantly.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="bg-indigo-700">
                <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
                    <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        <span class="block">Ready to start?</span>
                        <span class="block text-indigo-200">Join the gaming revolution today.</span>
                    </h2>
                    <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                        <div class="inline-flex rounded-md shadow">
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 transition-colors">
                                Get started
                            </a>
                        </div>
                        <div class="ml-3 inline-flex rounded-md shadow">
                            <a href="/store-listings" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 transition-colors">
                                Browse Games
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200" aria-labelledby="footer-heading">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="flex items-center justify-center md:justify-start">
                        <a href="/" class="flex items-center space-x-2">
                            <x-application-logo class="h-8 w-auto fill-current text-indigo-600" />
                            <span class="text-gray-900 font-medium">Arcade Gallery</span>
                        </a>
                    </div>
                    <nav class="flex justify-center space-x-6" aria-label="Footer navigation">
                        <a href="#" class="text-gray-500 hover:text-gray-900 transition-colors">Privacy</a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 transition-colors">Terms</a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 transition-colors">Contact</a>
                    </nav>
                    <div class="flex justify-center md:justify-end items-center text-gray-500">
                        &copy; {{ date('Y') }} Arcade Gallery. All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Mobile menu -->
    <div class="sm:hidden" id="mobile-menu" x-show="open" x-cloak>
        <div class="pt-2 pb-3 space-y-1">
            <a href="/" class="bg-indigo-50 border-indigo-500 text-indigo-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium" aria-current="page">
                Home
            </a>
            <a href="/store-listings" class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                Games
            </a>
            @auth
                <a href="{{ route('dashboard') }}" class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                    Log in
                </a>
                <a href="{{ route('register') }}" class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                    Register
                </a>
            @endauth
        </div>
    </div>
</body>
</html>
