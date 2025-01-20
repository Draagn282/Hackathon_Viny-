@extends('layouts.app')

@section('title', 'Forum Topics')

@section('content')
    <h1>Forum Topics</h1>
    <a href="{{ route('forums.create') }}" class="btn btn-primary">Create New Topic</a>
    
    <ul class="mt-3">
        @foreach ($blog as $blogs)
            <li>
                {{-- @dd($blog, $blogs) --}}
                <a href="forums/{{$blogs->id}}">{{ $blogs->header }}</a>
            </li>
        @endforeach
    </ul>
@endsection
