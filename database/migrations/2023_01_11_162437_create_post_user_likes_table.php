<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_user_likes', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('user_id');

            $table->index('post_id', 'post_user_like_post_idx');
            $table->index('user_id', 'post_user_like_user_idx');

            $table->foreign('post_id', 'post_user_like_post_fk')->references('id')->on('posts');
            $table->foreign('user_id', 'post_user_like_user_fk')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_user_likes');
    }
};
