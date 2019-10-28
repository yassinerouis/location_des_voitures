<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nom");
            $table->string("titre");
            $table->integer("nombre_de_voitures");
            $table->text("description");
            $table->string("image");
            $table->text("description_ref");
            $table->string("titre_ref");
            
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
        Schema::dropIfExists('cars_categories');
    }
}
