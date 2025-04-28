@extends('layout')

@section('title', 'All Posts')

@section('content')
    <div>
        <h1>All Posts</h1>

        @foreach ($posts as $post)
            <div>
                <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
                <p>By: {{ $post->author->name }}</p>
                <p>{{ Str::limit($post->content, 150) }}</p>
                <p>{{ $post->comments->count() }} comments</p>
                <hr>
            </div>
        @endforeach
    </div>
@endsection
