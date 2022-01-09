@extends('layout.all')

<h1><a href="{{Route('post.index')}}">Posts</a></h1>
<hr>

@if (session('message'))
    <div>
        {{ session('message') }}
    </div>
@endif

<hr>
<a href="{{ route('post.create') }}">Criar Novo Post</a>

<form action="{{ route('post.search') }}" method="post">
    @csrf
    <input type="text" name="search" placeholder="Pesquisar:">
    <button type="submit"><i class="fa fa-search"></i></button>
</form>

@foreach ($posts as $post)
    <p>
        {{ $post->title }} 
        [<a href="{{ route('post.show', $post->id) }}">
            Ver
        </a>] |
        <a href="{{ route('post.edit', $post->id) }}">
            editar
        </a>
    </p>
@endforeach

<hr>
{{$posts->links()}}