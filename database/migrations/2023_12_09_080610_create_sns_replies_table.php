<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnsRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sns_replies', function (Blueprint $table) {
            $table->id('index');  // これは実際には 'id' カラムとして動作します
            $table->unsignedBigInteger('post_id');  // 外部キーとして使用するカラム
            $table->foreign('post_id')
            ->references('id')
            ->on('sns_posts')
            ->onDelete('cascade');


            $table->string('email')->nullable(false);
            $table->foreign('email')
            ->references('email')
            ->on('users')
            ->onDelete('cascade');

            $table->string('text')->nullable(false);
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
        Schema::dropIfExists('sns_replies');
    }
}
