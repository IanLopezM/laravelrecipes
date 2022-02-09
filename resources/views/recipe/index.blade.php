<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<body style="background-color: #f7f6f2 !important; overflow-x: hidden; ">
    @if (Route::has('login'))
    <nav class="row navbar navbar-light bg-light text-end">
        @auth
    @else
        <div class="text-right">
            <button class="btn btn-outline-warning me-3"><a href="{{ route('login') }}" class="text-decoration-none">Log in</a></button>
        @if (Route::has('register'))
            <button class="btn btn-outline-secondary me-3"><a href="{{ route('register') }}" class="text-decoration-none">Register</a></button>
        @endif
        </div>
        @endauth
    </nav>
    @endif
    <h1 class="display-1 text-center text-black"><ins>Listado de recetas</ins></h1><br>
    <h5 class="text-center"><a class="link-warning alert-link" href="{{route('category.index')}}">Echale un vistazo al listado de categorias</a></h5>
    <div class="text-center">
        @if (count($recipes) > 0)
            @foreach ($recipes as $recipe)
                <div class="card border-warning bg-ligth" style="display: inline-block; margin: 1vw; width: 20%;">
                    <video class="video-fluid card-img-top" autoplay loop muted>
                        <source src="{{$recipe->url}}" type="video/mp4" />
                    </video>
                    <div class="card-body">
                        <h5 class="card-title" style="min-height: 8vh; max-height: 12vh; text-align: left !important;">{{ $recipe->title }}</h5>
                        <p class="card-text" style="min-height: 24vh; max-height: 70vh; text-align: left !important;">{{ $recipe->description }}</p>
                        <a href="{{route('recipe.show', ['recipe'=>$recipe])}}" class="btn btn-outline-warning">Miar la receta</a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center">
                <h3>Lo sentimos pero aun no hay recetas para esta categoría.</h3>
                <h5>Pero no estés triste, puedes crear ahora mismo una receta.</h5>
                <img src="https://media0.giphy.com/media/ZtGUEYxjokh9SuHe52/giphy.gif?cid=790b761162f71987d13a53f08a4c34d0b66290591e584f35&rid=giphy.gif&ct=s"  class="w-25" alt="No GIF"></br>
                <button type="button" class="btn btn-lg btn-dark" style="margin-bottom: 1vw;" onclick="window.location.href='{{route('recipe.create')}}'">Crear receta</button>
            </div>
        @endif
    </div>
</body>
