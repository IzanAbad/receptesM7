<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        //
        $recipes = Recipe::all();
        return view('recipes.index',compact('recipes'));

    }

    public function show(int $id)
    {
        //
        $recipe = Recipe::find($id);
        return view('recipes.show',compact('recipe'));
    }
}
