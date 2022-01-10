<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    .subtitle {
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
<body>
    <header></header>
    <main>
        <div class="title_main">
            <h1><a href="{{Route('post.index')}}">Posts</a></h1>
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