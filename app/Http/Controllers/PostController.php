<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index () {
        $posts = Post::all();
        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function create () {
        return view('admin.posts.create');
    }

    public function store (StoreUpdatePost $request) {
        Post::create($request->all());

        return redirect()->route('post.index');
    }

    public function show ($id)
    {
        // $post = Post::where('id', $id)->first();
        $post = Post::find($id);
        
        if(!$post) {
            return redirect()->route('post.index');
        }

        return view('admin.posts.show', compact('post'));
    }

    public function destroy ($id) {
        if (!$post = Post::find($id))
            return redirect()->route('post.index');

        $post->delete();

        return redirect()
            ->route('post.index')
            ->with('message', 'Post deletado com sucesso');
    }

    public function edit ($id) {
        $post = Post::find($id);

        if (!$post)
            return redirect()->back();

        return view('admin.posts.edit', compact('post'));
    }

    public function update (StoreUpdatePost $request, $id) {
        $post = Post::find($id);

        if (!$post) 
            return redirect()->back();

        $post->update($request->all());

        return redirect()->route('post.index')->with('message', 'Post editado com sucesso');
    }
}
