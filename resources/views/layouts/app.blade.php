<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Forum')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Additional CSS (optional) -->
    @yield('styles')
</head>
<body>
    <div class="mt-4">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg tw-bg-customLightBrown px-5">
            <a class="navbar-brand" href="{{ url('/') }}">Forum</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('forums.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('forums.create') }}">Create Topic</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content -->
        @yield('content')

        <!-- Footer -->
        <footer class="mt-5">
            <div class="text-center">
                <p>&copy; 2024 Laravel Forum. All Rights Reserved.</p>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Additional JS (optional) -->
    @yield('scripts')
</body>
</html>
