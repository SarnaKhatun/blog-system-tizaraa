<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = Post::latest()->paginate(10)->appends($request->query());
        return view('admin.posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|min:100',
        ]);


        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->author_id = Auth::user()->id;
        $post->published_at = $request->published_at;
        $post->save();

        return redirect(route('admin.posts.index'))->with('success', 'Post Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        if ($user->is_admin == 1)
        {
            $post = Post::find($id);
        }
        else {
            $post = Post::where('author_id', $user->id)->find($id);
        }
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found');
        }
        return view('admin.posts.create', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|min:100',
        ]);


        $post->title = $request->title;
        $post->content = $request->content;
        $post->author_id = Auth::user()->id;
        $post->published_at = $request->published_at;
        $post->save();

        return redirect(route('admin.posts.index'))->with('success', 'Post Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        if ($user->is_admin == 1)
        {
            $post = Post::find($id);
        }
        else {
            $post = Post::where('author_id', $user->id)->find($id);
        }
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found');
        }

        $post->delete();
        return redirect(route('admin.posts.index'))->with('success', 'Post Deleted successfully.');
    }

    public function toggle($id)
    {
        $post = Post::findOrFail($id);
        $post->published_at = $post->published_at ? null : now();
        $post->save();

        $status = $post->published_at ? 'published' : 'unpublished';

        return redirect()
            ->route('admin.posts.index')
            ->with('success', "Post {$status} successfully.");
    }


}
