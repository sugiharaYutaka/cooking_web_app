<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Recipe;

class BookmarkController extends Controller
{
    public function index()
    {
        $result = $this->getBookmarkedRecipes();
        return view('recipe.recipebookmark', compact('result'));
    }

    public function getBookmarkedRecipes()
    {
        /*
        // ログインしているユーザーのIDまたはEmailを取得
        $userId = auth()->id(); // ユーザーIDを取得（アプリに合わせて実装）
        $email = session('email'); // ユーザーのEmailを取得

        // Bookmarkモデルのリレーションを使ってブックマークされたRecipeの情報を取得
        $bookmarkedRecipes = Bookmark::where('email', $email)
            ->with('recipe') // Bookmarkモデルのリレーションをロード（Recipeモデルとのリレーションを想定）
            ->get();

        return $bookmarkedRecipes;*/

        $email = session('email');
        $result = Bookmark::select([
            'recipe_id',
            'email'
        ])
        ->from('bookmarks')
        ->join('recipes', function ($join){
            $join->on('bookmarks.recipe_id', '=', 'recipes.id');
        })
        ->where('bookmarks.email', $email)
        ->select('recipes.title','recipes.dish_image_filename','recipes.description')
        ->get();

        return $result;
    }
}
