<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liste', function(Blueprint $table){
                        $table->increments('id');
            $table->string('nom_liste',50);
            //cles étrangère
            $table->integer('id_users')->unsigned();
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
