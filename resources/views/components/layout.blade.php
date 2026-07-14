<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name', 'Online Store') }}</title>

    @fonts

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col min-h-screen antialiased">
    <!-- Header -->
    <header
        class="w-full border-b border-[#19140015] dark:border-[#3E3E3A] bg-white/50 dark:bg-black/50 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <!-- Brand / Logo -->
            <div class="flex items-center gap-8">
                <a href="{{ url('/') }}" wire:navigate class="font-semibold text-lg tracking-tight text-[#f53003]">
                    {{ config('app.name', 'Online Store') }}
                </a>

                <!-- Navigation Links -->
                <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">
                    <a href="{{ url('/') }}" wire:navigate
                        class="hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">Home</a>
                    <a href="{{ route('products') }}" wire:navigate
                        class="hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">Products</a>
                    <a href="{{ route('about') }}" wire:navigate class="hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">About</a>
                </nav>
            </div>

            <!-- Right Side Actions (Auth / Cart) -->
            <div class="flex items-center gap-4">
                <!-- Simple Cart Placeholder for Store -->
                <a href="#"
                    wire:navigate
                    class="relative p-2 text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors"
                    aria-label="Shopping Cart">
                    <i data-lucide="shopping-cart" class="w-6 h-6"></i>
                </a>

                @if (Route::has('login'))
                    <div class="hidden sm:flex items-center gap-2">
                        @auth
                            <a href="{{ url('/dashboard') }}" wire:navigate class="nav-link-outline">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" wire:navigate class="nav-link-flat">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" wire:navigate class="nav-link-outline">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" type="button"
                    class="md:hidden p-2 text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors"
                    aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle mobile menu">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Panel -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-[#19140015] dark:border-[#3E3E3A] bg-white dark:bg-[#0a0a0a] py-4 px-4 space-y-3">
            <nav class="flex flex-col gap-3 text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">
                <a href="{{ url('/') }}" wire:navigate class="hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">Home</a>
                <a href="{{ route('products') }}" wire:navigate class="hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">Products</a>
                <a href="{{ route('about') }}" wire:navigate class="hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">About</a>
            </nav>
            @if (Route::has('login'))
                <div class="pt-4 border-t border-[#19140015] dark:border-[#3E3E3A] flex flex-col gap-2">
                    @auth
                        <a href="{{ url('/dashboard') }}" wire:navigate class="nav-link-outline w-full text-center">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" wire:navigate class="nav-link-flat w-full text-center">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" wire:navigate class="nav-link-outline w-full text-center">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex flex-col items-center justify-center p-6 lg:p-8">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="w-full border-t border-[#19140015] dark:border-[#3E3E3A] bg-white dark:bg-[#0a0a0a] py-8 mt-auto">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-[#706f6c] dark:text-[#A1A09A]">
            <div>
                &copy; {{ date('Y') }} {{ config('app.name', 'Online Store') }}. All rights reserved.
            </div>
            <div class="flex gap-6">
                <a href="#" wire:navigate class="hover:underline">Privacy Policy</a>
                <a href="#" wire:navigate class="hover:underline">Terms of Service</a>
                <a href="#" wire:navigate class="hover:underline">Support</a>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>

</html>
