<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTacheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tache', function (Blueprint $table) {
                        $table->increments('id');
            $table->string('nom_tache',50);
            $table->string('Description',255);
            $table->timestamp('date_creation');
            $table->string('accomplissement');
            //cles étrangère
            $table->integer('id_users')->unsigned();
            $table->foreign('id_users')->references('id')->on('users');
            $table->integer('id_liste')->unsigned();
            $table->foreign('id_liste')->references('id')->on('liste')->onDelete('cascade');

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
