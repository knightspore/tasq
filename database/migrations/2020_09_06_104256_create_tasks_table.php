<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('priority')->default('8');
            $table->date('due');
            $table->string('user')->nullable();
            $table->string('is_client')->default(1);
            $table->string('site');
            $table->string('type');
            $table->text('name');
            $table->integer('words');
            $table->string('progress')->default('Not Picked Up');
            $table->text('comment')->nullable();
            $table->string('editor')->nullable();
            $table->string('folder')->nullable();
            $table->string('live_link')->nullable();
            $table->date('completed')->nullable();
            $table->boolean('archived')->default('0');
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
