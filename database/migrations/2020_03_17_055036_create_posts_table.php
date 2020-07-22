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
            $table->date('due');
            $table->string('user')->nullable();
            $table->string('project');
            $table->string('site');
            $table->string('type');
            $table->text('task');
            $table->integer('words');
            $table->string('progress')->default('Not Picked Up');
            $table->string('folder')->nullable();
            $table->text('comment')->nullable();
            $table->string('editor')->nullable();
            $table->date('completed')->nullable();
            $table->string('live')->nullable();
            $table->string('created_by')->nullable();
            $table->boolean('archived')->default('0');
            $table->string('dump')->nullable();
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
