<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::whereNotNull('published_at')->with('author')->latest()->paginate(10);
        return view('frontend.posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::whereNotNull('published_at')->where('id', $id)->first();

        if (!$post) {
            abort(404);
        }

        $post->load('author');

        return view('frontend.posts.show', compact('post'));
    }

}
