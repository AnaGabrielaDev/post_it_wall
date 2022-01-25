@extends('layout.all')

@section('titlePage')
    post
@endsection

@section('content')
    <div class="flex flex-col items-center justify-center">
        
        <div class="w-5/12 bg-white flex justify-evenly rounded items-center">
            <img 
                src="{{ url ("storage/{$posts->image}")}}" 
                alt="{{ $posts->title }}"
            />
            
            <div></div>

            <ul class="p-12 sm:w-8/12 md:w-1/2 lg:w-5/12">
                <li class="text-center text-3xl"> {{ $posts->title }} </li>
                <li class="text-center"> {{ $posts->content }} </li>
            </ul>    
        </div>
    
        <form action="{{ route('post.destroy', $posts->id) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button 
                type="submit" 
                class="rounded py-3 px-3 mt-6 font-medium tracking-widest text-white uppercase bg-red-500 shadow-lg focus:outline-none hover:bg-red-900 hover:shadow-none"
            >
                Excluir
            </button>
        </form>
    </div>
@endsection
