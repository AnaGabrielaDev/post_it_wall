@extends('layout.all')

@section('titlePage')
    Edição
@endsection
@section('subtitle')
Editar o post {{ $posts->title }}
@endsection

@section('content')
<form>
    @method('put')
    @include('admin.posts._partials.form')
</form>    
@endsection

