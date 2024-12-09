@extends('layouts.app')

@section('title', 'Create a New Topic')

@section('content')
    <h1>Create a New Forum Topic</h1>
    
    <form action="{{ route('forums.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="header">Title:</label>
            <input type="text" name="header" id="header" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Create Topic</button>
    </form>
@endsection
