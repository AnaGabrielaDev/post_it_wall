@if ($errors->any())
<ul>
   @foreach ($errors->all() as $error)
    <li>
        {{$error}}
    </li>
   @endforeach
</ul>
@endif

@csrf
<div class="flex flex-col items-center justify-center">
    <input 
        type="text" 
        name="title" 
        id="title" 
        placeholder="Titulo" 
        value="{{ $posts->title ??old('title')}}" 
        class="w-64 p-2 mt-1 text-black bg-pink-100 appearance-none focus:outline-none focus:bg-pink-100 focus:shadow-inner text-center align-middle"
    >
    <input
        type="text" 
        name="content" 
        id="content" 
        cols="30" 
        rows="4" 
        placeholder="Conteúdo" 
        class="w-64 p-2 mt-1 text-black bg-pink-100 appearance-none focus:outline-none focus:bg-pink-100 focus:shadow-inner text-center align-middle"
        value="{{$content  ?? old('content')}}"
    >
    <input 
        type="file" 
        name="image" 
        id="image"
        class="w-64 p-2 text-sm file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-pink-100 file:text-black hover:file:bg-grey-100"
    >
</div>

<p>
    <button 
        type="submit" 
        class="w-full py-3 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none text-center"
    >
        Enviar
    </button>
    
</p>
