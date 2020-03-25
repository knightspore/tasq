<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('level')->default('1');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('role')->default('Intern');
            $table->string('avatar')->default('https://blaq38zrmy32comx24qdya90-wpengine.netdna-ssl.com/wp-content/uploads/2019/12/tt-blank-avi.jpg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
