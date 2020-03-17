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
            $table->id();
            $table->integer('priority');
            $table->integer('level');
            $table->date('due-date');
            $table->string('user');
            $table->string('project');
            $table->string('site');
            $table->string('type');
            $table->text('task');
            $table->integer('points');
            $table->string('progress');
            $table->string('folder');
            $table->text('comment');
            $table->string('editor');
            $table->date('complete-date');
            $table->string('live-link');
            $table->string('created-by');
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
        Schema::dropIfExists('posts');
    }
}
