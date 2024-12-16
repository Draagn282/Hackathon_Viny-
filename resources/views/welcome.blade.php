<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('forums.index') }}">Forum</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="btn btn-primary nav-link text-white" href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Welcome to the Forum</h1>
        <p class="text-center">Join the conversation and explore trending topics!</p>

        <div class="row mt-4">
            <!-- Categories Section -->
            <div class="col-md-6">
                <h2>Categories</h2>
                <ul class="list-group">
                    <li class="list-group-item"><a href="#">General Discussion</a></li>
                    <li class="list-group-item"><a href="#">Tech Talk</a></li>
                    <li class="list-group-item"><a href="#">Gaming</a></li>
                    <li class="list-group-item"><a href="#">Programming</a></li>
                    <li class="list-group-item"><a href="#">Off-topic</a></li>
                </ul>
            </div>

            <!-- Recent Posts Section -->
            <div class="col-md-6">
                <h2>Recent Posts</h2>
                <ul class="list-group">
                    <li class="list-group-item">
                        <strong><a href="#">How to get started with Laravel?</a></strong>
                        <p>by <em>John Doe</em> - 2 hours ago</p>
                    </li>
                    <li class="list-group-item">
                        <strong><a href="#">Best games of 2024?</a></strong>
                        <p>by <em>Jane Smith</em> - 1 day ago</p>
                    </li>
                    <li class="list-group-item">
                        <strong><a href="#">Why is JavaScript so popular?</a></strong>
                        <p>by <em>Mike Lee</em> - 3 days ago</p>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center mt-5">
            <a href="#" class="btn btn-success btn-lg">Create an Account</a>
            <a href="#" class="btn btn-outline-secondary btn-lg">Explore as Guest</a>
        </div>
    </div>

    <footer class="bg-light py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2024 Forum System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
