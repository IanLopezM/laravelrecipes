<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Step;
use App\Models\Ingredient;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();

        return view('recipe.index')
            ->with('recipes', $recipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRecipeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipeRequest $request)
    {
        //validate->()
        $countrecipe = count(Recipe::all())+1;
        $countstep = count(Step::all())+1;
        $countingredient = count(Ingredient::all())+1;

        
        if ($request->hasFile('image')) {
            $image      = $request['image'];
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $path       = $image->storeAs('public', $fileName);
        } else {
            $path ='https://www.educol.net/photo-nuages-dl28835.jpg';
        }
        

        //$urlimg = Storage::url('images/'.'/'.$fileName);

        $recipe = new Recipe();
        $recipe->id = $countrecipe;
        $recipe->title = $request['title'];
        $recipe->description = $request['description'];
        $recipe->url = $request['url'];
        $recipe->image = $fileName;
        $recipe->user_id = $request['user_id'];
        $recipe->prepTime = $request['prepTime'];
        $recipe->category_id = $request['category_id'];
        $recipe->save();

        foreach($request['mystep'] as $key => $stepnow){
            $step = new Step();

            $step->id = $countstep;
            $step->text = $stepnow;
            $step->recipe_id = $countrecipe;
            $step->save();
            $countstep++;
        }

        foreach($request['myingredient'] as $key => $ingredientnow){
            $ingredient = new Ingredient();

            $ingredient->id = $countingredient;
            $ingredient->text = $ingredientnow;
            $ingredient->recipe_id = $countrecipe;
            $ingredient->save();
            $countingredient++;
        }



        return redirect("recipe");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('recipe.show')
            ->with('recipe', $recipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecipeRequest  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
