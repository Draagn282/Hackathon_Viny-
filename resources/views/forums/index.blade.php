@extends('layouts.app')

@section('title', 'Forum Topics')

@section('content')
    <h1>Forum Topics</h1>
    <a href="{{ route('forums.create') }}" class="btn btn-primary">Create New Topic</a>
    
    <ul class="mt-3">
        ...
    </ul>
@endsection
