<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index () {
        $posts = Post::orderBy('title', 'ASC')->paginate();
        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function create () {
        return view('admin.posts.create');
    }

    public function store (StoreUpdatePost $request) {
        $imageR = $request->image;
        $nameFile = $request->title;
        $data = $request->all();
        
        if ($imageR->isValid()) {
            $file = $imageR->storeAs('public/posts',$nameFile);
            $file = str_replace('public/','',$file);
            $data['image'] = $file;
        }

        Post::create($data);

        return redirect()->route('post.index');
    }

    public function show ($id)
    {
        // $posts = Post::where('id', $id)->first();
        $posts = Post::find($id);
        
        if(!$posts) {
            return redirect()->route('post.index');
        }

        return view('admin.posts.show', compact('posts'));
    }

    public function destroy ($id) {
        if (!$posts = Post::find($id))
            return redirect()->route('post.index');

        $posts->delete();

        return redirect()
            ->route('post.index')
            ->with('message', 'Post deletado com sucesso');
    }

    public function edit ($id) {
        $posts = Post::find($id);

        if (!$posts)
            return redirect()->back();

        return view('admin.posts.edit', compact('posts'));
    }

    public function update (StoreUpdatePost $request, $id) {
        $posts = Post::find($id);

        if (!$posts) 
            return redirect()->back();

        $posts->update($request->all());

        return redirect()
            ->route('post.index')
            ->with('message', 'Post editado com sucesso');
    }

    public function search (Request $request) {
        $posts = Post::where('title', 'like', '%'.$request->search.'%')
                    ->orderBy('title', 'ASC')
                    ->paginate();
        
        return view('admin.posts.index', compact('posts'));
    }
}
