@extends('layouts.app')

@section('title', 'Forum Blogs')

@section('content')
    <nav class="bg-customDarkBrown px-5 h-16 shadow-md">
        <div class="h-full">
            <!-- Tabs -->
            <ul class="flex items-center h-full" id="forumTabs" role="tablist">
                <li class="mr-1 h-full">
                    <a class="h-full flex items-center py-max px-4 text-white hover:text-white bg-customLightBrown active" id="beginners-tab" data-tab="beginners" href="#beginners" role="tab" aria-controls="beginners" aria-selected="true">Beginnersgids</a>
                </li>
                <li class="mr-1 h-full">
                    <a class="h-full flex items-center py-2 px-4 text-gray-400 hover:text-white" id="owners-tab" data-tab="owners" href="#owners" role="tab" aria-controls="owners" aria-selected="false">Eigenaars blogs</a>
                </li>
                <li class="mr-1 h-full">
                    <a class="h-full flex items-center py-2 px-4 text-gray-400 hover:text-white" id="general-tab" data-tab="general" href="#general" role="tab" aria-controls="general" aria-selected="false">Algemeen</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Tab Content -->
    <div class="mx-32" id="forumTabContent">
        <div class="tab-pane" id="beginners" role="tabpanel" aria-labelledby="beginners-tab">
            <div class="flex justify-between items-center my-3">
                <h1 class="text-xl font-bold">Beginnersgids Blogs</h1>
                <a href="{{ route('forums.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create New Blog</a>
            </div>
            <ul class="mt-3 space-y-2">
                <!-- List blogs for Beginnersgids -->
                @forelse($beginnersBlog as $blog)
                    <li>
                        <a href="{{ route('forums.show', $blog->id) }}" class="text-blue-500 hover:underline">{{ $blog->header }}</a>
                    </li>
                @empty
                    <li class="text-gray-500">Geen blogs gevonden.</li>
                @endforelse
            </ul>
        </div>
        <div class="hidden tab-pane" id="owners" role="tabpanel" aria-labelledby="owners-tab">
            <div class="flex justify-between items-center my-3">
                <h1 class="text-xl font-bold">Eigenaars Blogs</h1>
                <a href="{{ route('forums.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create New Blog</a>
            </div>
            <ul class="mt-3 space-y-2">
                <!-- List blogs for Eigenaars Blogs -->
                @forelse($ownersBlogs as $blog)
                    <li>
                        <a href="{{ route('forums.show', $blog->id) }}" class="text-blue-500 hover:underline">{{ $blog->header }}</a>
                    </li>
                @empty
                    <li class="text-gray-500">Geen blogs gevonden.</li>
                @endforelse
            </ul>
        </div>
        <div class="hidden tab-pane" id="general" role="tabpanel" aria-labelledby="general-tab">
            <div class="flex justify-between items-center my-3">
                <h1 class="text-xl font-bold">Algemeen Blogs</h1>
                <a href="{{ route('forums.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create New Blog</a>
            </div>
            <ul class="mt-3 space-y-2">
                <!-- List blogs for Algemeen -->
                @forelse($generalBlogs as $blog)
                    <li>
                        <a href="{{ route('forums.show', $blog->id) }}" class="text-blue-500 hover:underline">{{ $blog->header }}</a>
                    </li>
                @empty
                    <li class="text-gray-500">Geen blogs gevonden.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <script>
        // Tab switching logic for Tailwind CSS
        document.addEventListener('DOMContentLoaded', () => {
            const defaultTab = document.querySelector('[data-tab="#beginners"]');
            const defaultPane = document.querySelector('#beginners');

            // Activate default tab and pane
            defaultTab.classList.add('active', 'text-white', 'bg-customLightBrown');
            defaultPane.classList.remove('hidden');
        });

        document.querySelectorAll('[data-tab]').forEach(tab => {
            tab.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));

                // Hide all tab panes and deactivate tabs
                document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.add('hidden'));
                document.querySelectorAll('[data-tab]').forEach(tab => tab.classList.remove('active', 'text-white', 'bg-customLightBrown'));
                document.querySelectorAll('[data-tab]').forEach(tab => tab.classList.add('text-gray-400'));

                // Show the target tab pane and activate the tab
                target.classList.remove('hidden');
                this.classList.add('active', 'text-white', 'bg-customLightBrown');
                this.classList.remove('text-gray-400');
            });
        });
    </script>
@endsection
