<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<script src="{{ asset('js/app.js') }}" defer></script>
<style>
    body {
        background-color: grey;
    }
    h1 {
        text-align: center;
    }
    a {
        text-decoration-line: none;
    }
</style>


<!DOCTYPE html>
<html lang=" {{config('app.locale')}} ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titlePage') - Post it wall</title>
</head>
<body class="bg-black-50">
    <header class="bg-pink-100 py-1 flex justify-between items-center">
        <x-dropdown align="left" width="28">
            <x-slot name="trigger">
                <button class="flex items-center text-sm font-medium text-black decoration-black hover:border-gray-300 focus:outline-none focus:text-black transition duration-150 ease-in-out">
                    <div>{{ Auth::user()->name }}</div>

                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
        <h1 class="font-bold text-4xl m-auto">
            <a href="{{Route('post.index')}}">
                Posts
            </a>
        </h1>
        <div>
            <button class="px-5 py-1 mx-px my-px">
                <a href="{{ route('post.create') }}"
                    class="uppercase px-5 py-2 h-10 rounded shadow-lg shadow-black bg-pink-100 text-black hover:shadow-lg"
                >
                    Criar Novo Post
                </a>
            </button>
            <form action="{{ route('post.search') }}" method="post">
                @csrf
                <input type="text" name="search" placeholder="Pesquisar:" class="rounded px-5 h-10">
                <button type="submit">
                    <i class="fa fa-search px-5 py-2"></i>
                </button>
            </form>
        </div>
    </header>
    <main>
        <div class="title_main">
        </div>
        <br>
        <div class="subtitle">
            <h2>@yield('subtitle')</h2>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </main>
    <footer></footer>
</body>
</html>