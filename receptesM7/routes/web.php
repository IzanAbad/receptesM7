<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

Route::get('/recipes', 'App\Http\Controllers\RecipeController@index');
Route::get('/users', [UserController::class, 'index']);
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class,'show'])->name('categories.show');


Route::get('/recipes', [RecipeController::class,'index'])->name('recipe.index');
Route::get('/recipes/{id}', [RecipeController::class,'show'])->name('recipe.show');

Route::post('/comments/store',[CommentController::class,'store'])
                        ->name('comment.store');


Route::delete('/comments/',[CommentController::class,'delete'])
->name('comment.delete');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
