<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id('id');//レシピ固有のid

            $table->string('title')->nullable(false);//料理名などが入る
            $table->unsignedInteger('level')->nullable(false);//献立の難易度

            $table->string('email')->nullable(false);//投稿したユーザのemail
            $table->foreign('email')
            ->references('email')
            ->on('users')
            ->onDelete('cascade');

            $table->string('tag');//投稿を検索する際のtag '//'を区切り文字として、複数のタグがカラムに入る
            //例 #魚//#豚肉//

            $table->string('description');//レシピの説明
            $table->string('dish_image_filename');//レシピの画像
            $table->unsignedInteger('step_number');//工程の数　投稿するときに工程をいくつ追加したか
            $table->string('step_text');//工程の説明　'//'を区切り文字とする
            $table->string('step_image_filename');//工程の画像　'//'を区切り文字とする　画像がない工程はNULLとする
            //例 koutei1.png//NULL//koutei2.png//

            $table->string('point');//コツ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
