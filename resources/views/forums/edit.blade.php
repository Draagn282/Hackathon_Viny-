@extends('layouts.app')

@section('title', 'Edit Forum Topic')

@section('content')
    <h1>Edit Forum Topic</h1>
    
    <form action="{{ route('forums.update', $blog->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Specify the HTTP method as PUT to indicate it's an update request -->

        <div class="form-group">
            <label for="header">Title:</label>
            <input type="text" name="header" id="header" class="form-control" value="{{ old('header', $blog->header) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $blog->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Topic</button>
    </form>
@endsection
