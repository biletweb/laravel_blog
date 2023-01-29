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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->text('comment')->nullable();
            $table->text('answer_comment')->nullable();
            $table->timestamps();

            $table->index('post_id', 'comment_post_idx');
            $table->index('user_id', 'comment_user_idx');
            $table->index('comment_id', 'comment_comment_idx');

            $table->foreign('post_id', 'comment_post_fk')->references('id')->on('posts');
            $table->foreign('user_id', 'comment_user_fk')->references('id')->on('users');
            $table->foreign('comment_id', 'comment_comment_fk')->references('id')->on('comments');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
