@extends('frontend.master')
@section('title')
    Public Blog
@endsection
@section('content')
    <div class="container">
        @if (Route::has('login'))
            <nav class="flex text-end justify-end mt-2 gap-4">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                    >
                        Log in
                    </a>

                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Register
                    </a>
                @endif
                @endauth
            </nav>
        @endif
        <h1 class="mb-4">Blog Posts</h1>
        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ Str::limit($post->content, 100) }}</p>
                    <p><strong>Author:</strong> {{ $post->author->name }}</p>
                    <a href="{{ route('blog-show', $post->id) }}" class="btn btn-primary">Read more</a>
                </div>
            </div>
        @endforeach

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
