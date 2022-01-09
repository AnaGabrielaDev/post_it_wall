@extends('layout.all')

<h1><a href="{{Route('post.index')}}">Posts</a></h1>
<h1>Detalhes do Post</h1>

<ul>
    <li> {{ $posts->title }} </li>
    <li> {{ $posts->content }} </li>
</ul>

<form action="{{ route('post.destroy', $posts->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Deletar o post: "{{ $posts->title }}" </button>
</form>