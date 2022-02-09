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
    <div>
        <h1 class="display-1 text-center text-black"><ins>Listado de categorias</ins></h1><br>
        <h5 class="text-center"><a class="link-warning alert-link" href="{{route('recipe.index')}}">Echale un vistazo al listado de recetas</a></h5>
            <div class="text-center">
                @foreach ($categories as $category)
                <div class="card border-warning bg-ligth" style="display: inline-block; width: 18rem; margin: 1vw;">
                    <img src="https://img.blogs.es/anexom/wp-content/uploads/2017/04/etiqueta-categoria-920x515.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$loop->index+1}}. {{ $category->name }}</h5>
                        <p class="card-text">{{count($category->recipes)}} recetas disponibles.</p>
                        <a href="{{route('category.show', ['category'=>$category])}}" class="btn btn-outline-warning">Mira las recetas</a>
                    </div>
                </div>
                @endforeach
            </div>
            <br>
            @if (Route::has('login'))
            @auth
            <div class="text-center">
            <button type="button" class="btn btn-lg btn-dark" style="margin-bottom: 1vw;" onclick="window.location.href='{{route('recipe.create')}}'">Crear receta</button>
            </div>
            @endauth
            @endif
    </div>
</body>

