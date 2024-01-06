<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;

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

    public function insertRecipe(Request $request)
    {
        $tag =  str_replace(',','//',$request->tag);

        $dish_image = $request->file('dishImage');
        //時間とファイル名を結合して一意のファイル名を生成
        $dish_image_filename = time() . $dish_image->getClientOriginalName();
        $dish_image->move(public_path('recipe/image'), $dish_image_filename);

        $stepText = "";
        $stepImage_filename = "";
        for ($index = 1; $index <= $request->stepCount; $index++){
            $stepText = $stepText . $request->input('step' . (string)$index . 'Text');
            $Image = $request->file('step' . (string)$index . 'Image');

            if($Image == null){//stepの画像が何もなかった場合
                $stepImage_filename = $stepImage_filename . 'NULL';
            }
            else{//stepの画像があった場合
                $img_filename = time() . $Image->getClientOriginalName();
                $Image->move(public_path('recipe/image'), $img_filename);
                $stepImage_filename = $stepImage_filename . $img_filename;
            }

            if($index != $request->stepCount){//区切り文字追加
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
            'step_number' =>  $request->stepCount,
        ]);
    }
}
