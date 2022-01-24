<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('title', 'ASC')->paginate();
        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StoreUpdatePost $request)
    {
        $imageR = $request->image;
        $nameFile = $request->title;
        $data = $request->all();

        if ($imageR->isValid()) {
            $file = $imageR->storeAs('public/posts', $nameFile);
            $file = str_replace('public/', '', $file);
            $data['image'] = $file;
        }

        Post::create($data);

        return redirect()->route('post.index');
    }

    public function show($id)
    {
        // $posts = Post::where('id', $id)->first();
        $posts = Post::find($id);

        if (!$posts) {
            return redirect()->route('post.index');
        }

        return view('admin.posts.show', compact('posts'));
    }

    public function destroy($id, Request $request)
    {
        $imageR = $request->image;

        if (!$posts = Post::find($id))
            return redirect()->route('post.index');

        if (Storage::exists($imageR)) {
            Storage::delete($imageR);
        }

        $posts->delete();

        return redirect()
            ->route('post.index')
            ->with('message', 'Post deletado com sucesso');
    }

    public function edit($id)
    {
        $posts = Post::find($id);
        if (!$posts)
            return redirect()->back();

        return view('admin.posts.edit', compact('posts'));
    }

    public function update(StoreUpdatePost $request, $id)
    {
        $imageR = $request->image;
        $nameFile = $request->title;
        $posts = Post::find($id);

        if (!$posts)
            return redirect()->back();

        $data = $request->all();

        if ($imageR && $imageR->isValid()) {
            if (Storage::exists($posts->image)) {
                Storage::delete($posts->image);
            }

            $nameFile = Str::of($request->title)->slug('-') . '.' . $request->image->getClientOriginalExtension();

            $image = $request->image->storeAs('posts', $nameFile);
            $data['image'] = $image;
        }

        $posts->update($data);

        return redirect()
            ->route('post.index')
            ->with('message', 'Post editado com sucesso');
    }

    public function search(Request $request)
    {
        $posts = Post::where('title', 'like', '%' . $request->search . '%')
            ->orderBy('title', 'ASC')
            ->paginate();

        return view('admin.posts.index', compact('posts'));
    }
}
