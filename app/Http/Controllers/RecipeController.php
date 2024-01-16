<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{

    public function __construct()
    {
        // 'auth' ミドルウェアを使用して、'index' アクション以外のアクションにのみ適用
        $this->middleware('auth')->only('post');
    }

    public function index()
    {
        $recipePost = $this->getRecipe(0, 10);
        return view('recipe.recipe', compact('recipePost'));
    }

    public function post()
    {
        return view('recipe.recipepost');
    }

    public function insertRecipe(Request $request)
    {
        $tag = str_replace(',', '//', $request->tag);

        $dish_image = $request->file('dishImage');
        //時間とファイル名を結合して一意のファイル名を生成
        $dish_image_filename = time() . $dish_image->getClientOriginalName();
        $dish_image->move(public_path('recipe/image'), $dish_image_filename);

        $stepText = "";
        $stepImage_filename = "";
        for ($index = 1; $index <= $request->stepCount; $index++) {
            $stepText = $stepText . $request->input('step' . (string) $index . 'Text');
            $Image = $request->file('step' . (string) $index . 'Image');

            if ($Image == null) { //stepの画像が何もなかった場合
                $stepImage_filename = $stepImage_filename . 'NULL';
            } else { //stepの画像があった場合
                $img_filename = time() . $Image->getClientOriginalName();
                $Image->move(public_path('recipe/image'), $img_filename);
                $stepImage_filename = $stepImage_filename . $img_filename;
            }

            if ($index != $request->stepCount) { //区切り文字追加
                $stepText = $stepText . '//';
                $stepImage_filename = $stepImage_filename . '//';
            }
        }

        Recipe::create([
            'title' => $request->title,
            'level' => $request->level,
            'email' => session('email'),
            'tag' => $tag,
            'description' => $request->description,
            'ingredients' => $request->ingredients,
            'dish_image_filename' => $dish_image_filename,
            'step_text' => $stepText,
            'step_image_filename' => $stepImage_filename,
            'point' => $request->point,
            'step_number' => $request->stepCount,
        ]);
    }
    public function getRecipe($offset, $limit)
    {
        $result = Recipe::select([
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
            ->from('recipes')
            ->join('users', function ($join) {
                $join->on('recipes.email', '=', 'users.email');
            })
            ->select('users.name', 'users.icon_filename', 'recipes.*')
            ->orderBy('recipes.id', 'desc')
            ->offset($offset)
            ->limit($limit)
            ->get();

        return $result;

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

    public function moreRecipe(Request $request)
    {

        $page = $request->get('page');
        $perPage = 10; // 1ページあたりのデータ数

        $recipePost = $this->getRecipe(($page - 1) * $perPage, $perPage);

        return view('recipe.morerecipe')->with('recipePost', $recipePost);
    }


    public function oneRecipe($id)
    {

        $post = Recipe::join('users', 'users.email', '=', 'recipes.email')
            ->where('recipes.id', $id) // IDのユーザーに関連する投稿を取得
            ->first();
        $post['step_text'] = explode('//', $post['step_text']);
        $post['step_image_filename'] = explode('//', $post['step_image_filename']);
        $post['ingredients'] = explode('//', $post['ingredients']);
        $post['tag'] = explode('//', $post['tag']);

        return view('recipe.recipeone', compact('post', 'id'));
    }
}
