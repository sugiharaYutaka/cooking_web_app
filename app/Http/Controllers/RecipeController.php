<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        return view('recipe.recipe');
    }

    public function post()
    {
        return view('recipe.recipepost');
    }

    public function bookmark()
    {
        return view('recipe.recipebookmark');
    }
}
