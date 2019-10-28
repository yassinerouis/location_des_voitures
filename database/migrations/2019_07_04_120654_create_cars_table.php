<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('car_categorie_id');
            $table->string('Nom');
            $table->string('type');
            $table->integer('nombre_places');
            $table->integer('air');
            $table->integer('doors');
            $table->integer('bags');
            $table->string('image');
            $table->string('image_alt');
            
            $table->tinyInteger('active');
            $table->tinyInteger('disponible');
            $table->tinyInteger('climatise');
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
        Schema::dropIfExists('cars');
    }
}
