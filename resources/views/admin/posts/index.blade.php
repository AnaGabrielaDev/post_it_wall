@extends('layout.all')
@section('titlePage')
    Home
@endsection

@if (session('message'))
    <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-pink-100 border border-black-300 ">
        {{ session('message') }}
    </div>
@endif

@section('content')
    <table class="w-11/12 bg-white mx-auto">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-black-500 tracking-wider bg-pink-100">ID</th>
                <th class="px-6 py-3 border-b-2 border-pink-100 text-left text-sm leading-4 text-black-500 tracking-wider bg-pink-100">Nome</th>
                <th class="px-6 py-3 border-b-2 border-pink-100 text-left text-sm leading-4 text-black-500 tracking-wider bg-pink-100">Imagem</th>
                <th class="px-6 py-3 border-b-2 border-pink-100 text-left text-sm leading-4 text-black-500 tracking-wider bg-pink-100">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="px-2 py-1 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm w-1">
                        #{{ $post->id }}
                    </td>
                    <td class="border-b border-gray-500 py-1">
                        {{ $post->title }} 
                    </td>
                    <td class="border-b border-gray-500 py-1 px-8">
                        <img src="{{ url ("storage/{$post->image}") }}" alt="{{$post->title}}" style="max-width : 40px;">
                    </td>
                    <td class="border-b border-gray-500 py-1 px-8">
                        <a href="{{ route('post.show', $post->id) }}">
                            <i class="fa fa-eye"></i>
                        </a> |
                        <a href="{{ route('post.edit', $post->id) }}">
                            <i class="fa fa-pencil" style="color: black"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

{{$posts->links()}}