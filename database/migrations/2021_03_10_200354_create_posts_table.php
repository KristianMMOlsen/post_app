<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); //id for the post
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //id of the user who created the post
            $table->text('title'); //title for posts
            $table->text('body'); //the content of the textarea
            $table->timestamps(); //time created/updated
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
