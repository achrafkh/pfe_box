<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            
            $table->integer('showroom_id')->unsigned()->nullable();
            $table->integer('role_id')->unsigned();

            $table->string('fullname');
            $table->string('email');
            $table->string('username')->unique();
            $table->string('password');
            

            $table->rememberToken();
            $table->timestamps();

            $table->foreign('showroom_id')->references('id')->on('showrooms')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
