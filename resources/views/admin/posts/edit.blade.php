@extends('layout.all')

@section('titlePage')
    Edição
@endsection

@section('content')
<form action= "{{route('post.update', $posts->id)}}" method="post" enctype="multipart/form-data">
    @method('put')
    @include('admin.posts._partials.form')
</form>    
@endsection
