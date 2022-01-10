@extends('layout.all')

<h1><a href="{{Route('post.index')}}">Posts</a></h1>
<h1>Editar o post {{ $posts->title }} </h1>

<form>
    @method('put')
    @include('admin.posts._partials.form')
</form>