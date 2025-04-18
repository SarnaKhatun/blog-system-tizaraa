@extends('frontend.master')
@section('title')
    {{ $post->title }} Details
@endsection
@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p><strong>Author:</strong> {{ $post->author->name }}</p>
        <p><strong>Published:</strong> {{ $post->created_at->format('F j, Y') }}</p>

        <div class="mt-3">
            {!! nl2br(e($post->content)) !!}
        </div>

        <a href="{{ route('blog-index') }}" class="btn btn-secondary mt-4">Back to posts</a>
    </div>
@endsection
