<h1>Posts</h1>
<hr>

<style>
    body {
        color: black
    } 
</style>

@if (session('message'))
    <div>
        {{ session('message') }}
    </div>
@endif

<hr>
<a href="{{ route('post.create') }}">Criar Novo Post</a>

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
