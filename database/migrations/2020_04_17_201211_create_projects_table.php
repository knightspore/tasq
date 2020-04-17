<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('site');
            $table->string('sop')->default('https://drive.google.com');
            $table->string('name');
            $table->string('clientname');
            $table->string('niche');
            $table->string('accountmgr')->nullable();
            $table->boolean('upload')->default(1);
            $table->boolean('client')->default(0);
            $table->string('logo')->nullable(); //New
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
        Schema::dropIfExists('projects');
    }
}
