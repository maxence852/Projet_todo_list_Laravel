<?php

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
            $table->string('name');
            $table->string('prenom',50);
            $table->string('pseudo',50);
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('tel',20);
            $table->string('pays',60);
            $table->date('date');
            $table->string('genre',50);
            $table->integer('numpostal',false,false);
            $table->string('nomville',50);
            $table->string('nomrue',50);
            $table->integer('numerorue',false,false);
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
        Schema::drop('users');
    }
}
