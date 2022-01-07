<h1>Editar o post {{ $post->title }} </h1>

@if ($errors->any())
    <ul>
       @foreach ($errors->all() as $error)
        <li>
            {{$error}}
        </li>
       @endforeach
    </ul>
@endif

<form action=" {{ route('post.update', $post->id) }} " method="post">
    @csrf
    @method('put')
    <input type="text" name="title" id="title" placeholder="Titulo" value="{{ $post->title }}">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="Conteudo">{{ $post->content }}</textarea>
    <button type="submit">Enviar</button>
</form>