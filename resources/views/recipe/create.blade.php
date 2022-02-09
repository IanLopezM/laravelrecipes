<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        <form action="{{route('recipe.store')}}" enctype="multipart/form-data" method="POST" class="ms-4">
        @csrf
            <div class="form-group">
                <h5 for="title">Título</h5>
                <input id="title" name="title" type="input" class="form-control w-25"><br/>
            </div>
            <div class="form-group">
                <h5>Descripción</h5>
                <textarea id="description" name="description" type="input" class="form-control w-25" rows="3"></textarea>
            </div>
            <input id="url" name="url" type="hidden" value="https://cdn.rtva.interactvty.com/Chopper/cometelo/0000114644/0000114644.mp4">
            <div class="form-group">
                <h5>Imagen</h5><br/>
                <input id="image" name="image" type="file" accept="image/*" class="form-control w-25"><br/>
            </div>
            <input id="user_id" name="user_id" type="hidden" value="{{Auth::id()}}">
            <div class="form-group">
                <h5>Tiempo</h5>
                <input id="prepTime" name="prepTime" type="number" class="form-control w-25"><br/>
            </div>
            <div>
                <h5>Categoria:</h5>
                <select name="category_id" class="form-select form-select w-25">
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
                </select><br/>
            </div>
            <h5>Pasos:</h5>
            <div class="stepsc">
                <button type="button" class="add_form_field btn btn-warning mt-2 mb-2">+</button>
                <div><input type="text" name="mystep[]" class="form-control w-50"></div>
            </div>
            <h5>Ingredientes:</h5>
            <div class="ingredientsc">
                <button type="button" class="add_form_field2 btn btn-warning mt-2 mb-2">+</button>
                <div><input type="text" name="myingredient[]" class="form-control w-25"></div>
            </div>
            <div class="text-center mt-4">
                <input id="submit" type="submit" class="btn btn-warning"><br/>
            </div>
        </form> 
    </div>
</body>

<script>
    $(document).ready(function() {
        var max_fields = 10;
        var max_fields2 = 10;
        var wrapper = $(".stepsc");
        var wrapper2 = $(".ingredientsc");
        var add_button = $(".add_form_field");
        var add_button2 = $(".add_form_field2");

        var x = 1;
        $(add_button).click(function(e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<div><input  style="display:inline-block;" type="text" name="mystep[]" class="form-control w-50"/><a style="display:inline-block;" href="#" class="delete btn btn-warning btn-sm text-decoration-none ms-1">Borra este paso</a></div>'); //add input box
            } else {
                alert('You Reached the limits')
            }
        });
        $(add_button2).click(function(e) {
            e.preventDefault();
            if (x < max_fields2) {
                x++;
                $(wrapper2).append('<div><input style="display:inline-block;" type="text" name="myingredient[]" class="form-control w-25"/><a style="display:inline-block;" href="#" class="delete btn btn-warning btn-sm text-decoration-none ms-1">Borra este ingrediente</a></div>'); //add input box
            } else {
                alert('You Reached the limits')
            }
        });

        $(wrapper).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
        $(wrapper2).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
    });


</script>
