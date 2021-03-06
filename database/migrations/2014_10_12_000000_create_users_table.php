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
            $table->uuid('id')->primary();
            $table->string('first_name' , 100)->nullable();
            $table->string('last_name' , 100)->nullable();
            $table->string('email' , 100)->unique();
            $table->string('phone' , 100)->unique()->nullable();
            $table->integer('verified')->default(0)->nullable();
            $table->string('token' , 150)->unique()->nullable();
            $table->string('reset_token' , 150)->unique()->nullable();
            $table->integer('person')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('password' , 100);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
