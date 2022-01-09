@extends('layout.all')

<h1><a href="{{Route('post.index')}}">Posts</a></h1>
<h1>Editar o post {{ $posts->title }} </h1>

@if ($errors->any())
    <ul>
       @foreach ($errors->all() as $error)
        <li>
            {{$error}}
        </li>
       @endforeach
    </ul>
@endif

<form action=" {{ route('post.update', $posts->id) }} " method="post">
    @csrf
    @method('put')
    <input type="text" name="title" id="title" placeholder="Titulo" value="{{ $posts->title }}">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="Conteudo">{{ $posts->content }}</textarea>
    <button type="submit">Enviar</button>
</form>