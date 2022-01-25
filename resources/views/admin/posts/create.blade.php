@extends('layout.all')
@section('titlePage')
    criar
@endsection

@section('content')
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @include('admin.posts._partials.form')
    </form>
    
@endsection