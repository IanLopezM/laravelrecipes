<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/", [CategoryController::class, "index"])->name("category.index");

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get("/category", [CategoryController::class, "index"])->name("category.index");
Route::get("/category/{category}", [CategoryController::class, "show"])->name("category.show");

Route::get("/recipe", [RecipeController::class, "index"])->name("recipe.index");
Route::get("/recipe/create", [RecipeController::class, "create"])->name("recipe.create");
Route::post("/recipe/store", [RecipeController::class, "store"])->name("recipe.store");
Route::get("/recipe/{recipe}", [RecipeController::class, "show"])->name("recipe.show");

Route::post("/comment/store", [CommentController::class, "store"])->name("comment.store");

