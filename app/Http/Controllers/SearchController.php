<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request){
        $title = $request->input('query');
        if($title)
        {
            $recipePost = $this->getRecipes($title);
            return view('recipe.recipe', compact('recipePost'));
        }
        else
        {
            return redirect()->back();
        }
    }
    private function getRecipes($title){

        $query = Recipe::select([
            'recipes.id',
            'recipes.title',
            'recipes.level',
            'recipes.tag',
            'recipes.description',
            'recipes.ingredients',
            'recipes.dish_image_filename',
            'recipes.step_text',
            'recipes.step_image_filename',
            'recipes.point',
            'recipes.step_number',
        ])
            ->join('users', 'recipes.email', '=', 'users.email')
            ->select('users.name', 'users.icon_filename', 'recipes.*');

        if ($title) {
            $query->where(function ($query) use ($title) {
                $query->orWhere('recipes.title', 'LIKE', "%$title%");
            });
        }

        $result = $query->orderBy('recipes.id', 'desc')
            ->take(5)
            ->get();

        $array = [];
        foreach ($result as $row) {
            $row['step_text'] = explode('//', $row['step_text']);
            $row['step_image_filename'] = explode('//', $row['step_image_filename']);
            $row['ingredients'] = explode('//', $row['ingredients']);
            $row['tag'] = explode('//', $row['tag']);

            array_push($array, $row);
        }
        return $array;
    }
}
