@extends('layout.all')
@section('titlePage')
    Home
@endsection

@if (session('message'))
    <div>
        {{ session('message') }}
    </div>
@endif


@section('subtitle')
    <a href="{{ route('post.create') }}">Criar Novo Post</a>    
@endsection

@section('content')
    <form action="{{ route('post.search') }}" method="post">
        @csrf
        <input type="text" name="search" placeholder="Pesquisar:">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>

    @foreach ($posts as $post)
        <p>
            <img src="{{ url ("storage/{$post->image}") }}" alt="{{$post->title}}" style="max-width : 40px;">
            {{ $post->title }} 
            [<a href="{{ route('post.show', $post->id) }}">
                Ver
            </a>] |
            <a href="{{ route('post.edit', $post->id) }}">
                editar
            </a>
        </p>
    @endforeach
@endsection

{{$posts->links()}}