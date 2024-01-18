<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Recipe;

class BookmarkController extends Controller
{

    public function __construct()
    {
        // 'auth' ミドルウェアを使用して、'index' アクション以外のアクションにのみ適用
        $this->middleware('auth');
    }

    public function index()
    {
        $result = $this->getBookmarkedRecipes(0, 10);
        return view('recipe.recipebookmark', compact('result'));
    }

    public function getBookmarkedRecipes($offset, $limit)
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
            ->join('recipes', function ($join) {
                $join->on('bookmarks.recipe_id', '=', 'recipes.id');
            })
            ->where('bookmarks.email', $email)
            ->select('recipes.id', 'recipes.title', 'recipes.dish_image_filename', 'recipes.description')
            ->offset($offset)
            ->limit($limit)
            ->get();

        return $result;
    }


    public function moreBookmark(Request $request)
    {

        $page = $request->get('page');
        $perPage = 10; // 1ページあたりのデータ数

        $result = $this->getBookmarkedRecipes(($page - 1) * $perPage, $perPage);

        return view('recipe.morebookmark')->with('result', $result);
    }


    public function addBookmark($id)
    {
        Bookmark::create([
            'email' => session('email'),
            'recipe_id' => $id,

        ]);
        return redirect()->back();
    }


    public function removeBookmark($id)
    {
        Bookmark::where([
            ['email', '=', session('email')],
            ['recipe_id', '=', $id],
        ])
            ->delete();

        return redirect()->back();
    }
}
