@extends('layouts.app')

@section('title', 'Forum Topics')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
        <div class="">
            <!-- Tabs -->
            <ul class="nav nav-tabs" id="forumTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="beginners-tab" data-bs-toggle="tab" href="#beginners" role="tab" aria-controls="beginners" aria-selected="true">Beginnersgids</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="owners-tab" data-bs-toggle="tab" href="#owners" role="tab" aria-controls="owners" aria-selected="false">Eigenaars blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="general-tab" data-bs-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="false">Algemeen</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Tab Content -->
    <div class="container tab-content mt-3" id="forumTabContent">
        <div class="tab-pane fade show active" id="beginners" role="tabpanel" aria-labelledby="beginners-tab">
            <div class="d-flex justify-content-between align-items-center my-3">
                <h1>Beginnersgids Topics</h1>
                <a href="{{ route('forums.create') }}" class="btn btn-primary">Create New Topic</a>
            </div>
            <ul class="mt-3">
                <!-- List topics for Beginnersgids -->
            </ul>
        </div>
        <div class="tab-pane fade" id="owners" role="tabpanel" aria-labelledby="owners-tab">
            <div class="d-flex justify-content-between align-items-center my-3">
                <h1>Eigenaars Blogs Topics</h1>
                <a href="{{ route('forums.create') }}" class="btn btn-primary">Create New Topic</a>
            </div>
            <ul class="mt-3">
                <!-- List topics for Eigenaars Blogs -->
            </ul>
        </div>
        <div class="tab-pane fade" id="general" role="tabpanel" aria-labelledby="general-tab">
            <div class="d-flex justify-content-between align-items-center my-3">
                <h1>Algemeen Topics</h1>
                <a href="{{ route('forums.create') }}" class="btn btn-primary">Create New Topic</a>
            </div>
            <ul class="mt-3">
                <!-- List topics for Algemeen -->
            </ul>
        </div>
    </div>
@endsection
