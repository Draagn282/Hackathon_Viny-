<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Forum')</title>

    @vite('resources/css/app.css')

    <!-- Additional CSS (optional) -->
    @yield('styles')
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-customLightBrown px-5 py-4 shadow-md">
            <div class="container mx-auto flex items-center justify-between">
                <a class="text-lg font-bold text-white" href="{{ url('/') }}">Forum</a>
                <button class="md:hidden text-white focus:outline-none" aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="hidden md:flex space-x-6">
                    <a class="text-white hover:text-gray-300" href="{{ route('forums.index') }}">Home</a>
                    <a class="text-white hover:text-gray-300" href="{{ route('forums.create') }}">Create Topic</a>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="py-4">
            <div class="text-center text-gray-400">
                <p>&copy; 2024 Laravel Forum. All Rights Reserved.</p>
            </div>
        </footer>
    </div>

    <!-- Additional JS (optional) -->
    @yield('scripts')
</body>
</html>
