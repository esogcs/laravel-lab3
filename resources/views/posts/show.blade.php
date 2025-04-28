@extends('layout')

@section('title', $post->title)

@section('content')
    <div>
        <h1>{{ $post->title }}</h1>
        <p>By: {{ $post->author->name }}</p>
        <p>Posted on: {{ $post->created_at->format('F j, Y') }}</p>

        <div>
            {{ $post->content }}
        </div>

        <hr>

        <h3>Comments ({{ $post->comments->count() }})</h3>

        @foreach ($post->comments as $comment)
            <div>
                <p><strong>{{ $comment->commenter_name }}</strong> on {{ $comment->created_at->format('F j, Y') }}</p>
                <p>{{ $comment->comment }}</p>
                <hr>
            </div>
        @endforeach

        <h3>Add a Comment</h3>
        <form action="{{ route('comments.store', $post->id) }}" method="POST">
            @csrf
            <div>
                <label for="commenter_name">Name:</label>
                <input type="text" id="commenter_name" name="commenter_name" required>
            </div>
            <div>
                <label for="comment">Comment:</label>
                <textarea id="comment" name="comment" rows="4" required></textarea>
            </div>
            <button type="submit">Submit Comment</button>
        </form>
    </div>
@endsection
