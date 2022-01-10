@extends('layout.all')

@section('titlePage')
    post
@endsection

@section('subtitle')
    Detalhes do Post 
@endsection

@section('content')
    <ul>
        <li> {{ $posts->title }} </li>
        <li> {{ $posts->content }} </li>
    </ul>

    <form action="{{ route('post.destroy', $posts->id) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">Deletar o post: "{{ $posts->title }}" </button>
    </form>    
@endsection
