<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<body style="background-color: #f7f6f2 !important; overflow-x: hidden; ">
    @if (Route::has('login'))
    <nav class="row navbar navbar-light bg-light text-end">
        @auth
    @else
        <div class="text-right">
            <button class="btn btn-outline-btn-dark me-3"><a href="{{ route('login') }}" class="text-decoration-none">Log in</a></button>
        @if (Route::has('register'))
            <button class="btn btn-outline-secondary me-3"><a href="{{ route('register') }}" class="text-decoration-none">Register</a></button>
        @endif
        </div>
        @endauth
    </nav>
    @endif
    <h1 class="display-1 text-center text-black"><ins>{{ $recipe->title }}</ins></h1><br>
    <h5 class="text-center"><a class="link-btn-dark alert-link" href="{{route('recipe.index')}}">Vuelve al listado de recetas</a></h5>
    <h3 class="text-left text-black" style="margin-left: 2vw;">{{$recipe->description}}</h3>
    <div class="text-center">
        <img src="http://localhost:8000/storage/{{$recipe->image}}" alt="Recipe Image" class="border border-btn-dark rounded w-50">
    </div>
    <h5 class="text-left text-black mt-2" style="margin-left: 2vw; margin-bottom: 2vw;">El tiempo de preparación es de {{$recipe->prepTime}} minutos.</h5>
    <h3 style="margin-left: 2vw;">Pasos a seguir:</h3>
    <ol class="list-group" style="margin-left: 2vw; margin-bottom: 2vw;">
        @foreach($recipe->steps as $step)
            <li class="list-group-item list-group-item-btn-dark w-50"><p>{{$step->text}}</p></li>
        @endforeach
    </ol>
    <h3 style="margin-left: 2vw;">Ingredientes necesarios:</h3>
    <ul class="list-group" style="margin-left: 2vw; margin-bottom: 2vw;">
        @foreach($recipe->ingredients as $ingredient)
            <li class="list-group-item list-group-item-btn-dark w-25"><p>{{$ingredient->text}}</p></li>
        @endforeach
    </ul>
    <h3 style="margin-left: 2vw;">Commentarios:</h3>
    <form action="{{route('comment.store')}}" method="POST" class="ms-4">
        @csrf 
        <textarea id="text" name="text" type="input" class="form-control w-25" rows="3"  style="margin-left: 2vw;"></textarea>
        <input id="user_id" name="user_id" type="hidden" value="{{Auth::id()}}">
        <input id="recipe_id" name="recipe_id" type="hidden" value="{{$recipe->id}}">
        @if (Route::has('login'))
        @auth
            <input id="submit" type="submit" class="btn btn-btn-dark"  style="margin-left: 2vw;"><br/>
        @else
            <p class="text-muted" style="margin-left: 4vw;">Inicia sesión para dejar un comentario.</p>
        @endauth
        @endif

    </form>
    @foreach($recipe->comments as $comment)
        <h3 class="text-btn-dark" style="margin-left: 2vw;">{{$comment->user->name}}</h3>
        <h5 class="text-muted" style="margin-left: 4vw;">{{$comment->text}}</h5>
    @endforeach
    <h5 class="text-center text-black" style="margin-left: 2vw;">Receta creada por {{$recipe->user->name}}</h5>

</body>