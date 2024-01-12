<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Post;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function index(Request $request)
    {
        // 確認用
        // dd($request->all());

        $tags = $request->input('tags');
        $levels = $request->input('levels');

        if ($tags || $levels) {
            $recipePost = $this->getRecipeWithSpecificTags($tags, $levels);
        } else {
            // デフォルトの処理またはエラー処理を追加する場合
            $recipePost = Recipe::latest()->take(5)->get(); // 仮の空の配列を返す例
        }
        return view('recipe.recipe', compact('recipePost'));
    }

    public function getRecipeWithSpecificTags($tags, $levels)
    {
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

        if ($tags) {
            $query->where(function ($query) use ($tags) {
                foreach ($tags as $tag) {
                    $query->orWhere('recipes.tag', 'LIKE', "%$tag%");
                }
            });
        }

        if ($levels) {
            $query->whereIn('recipes.level', $levels);
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
