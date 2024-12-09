@extends('layouts.app')

@section('title', $blog->header)

@section('content')
    <div class="container">
        <!-- Blog Post -->
        <div class="post">
            <h1>{{ $blog->header }}</h1>
            <p>{{ $blog->description }}</p>
            <p><strong>Posted by:</strong> {{ $blog->account->name }}</p> <!-- Access account's name -->
            <a href="{{ route('forums.edit', $blog->id) }}" class="btn btn-secondary">Edit</a>
            <form action="{{ route('forums.destroy', $blog->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>

        <hr>

        <!-- Comments Section -->
        <div class="comments">
            <h3>Comments</h3>
            @foreach ($comments as $comment)
            {{-- @dd($comments, $comment) --}}
                <div class="comment">
                    <p><strong>{{ $comment->account->name }}:</strong> {{ $comment->content }}</p>
                    <p><em>Posted on: {{ $comment->created_at}}</em></p>
                </div>
                <hr>
            @endforeach

            <!-- Add Comment Form -->
            <h4>Add a Comment</h4>
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                <textarea name="content" class="form-control" rows="4" placeholder="Write your comment here" required></textarea>
                <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
            </form>
        </div>
    </div>
@endsection
