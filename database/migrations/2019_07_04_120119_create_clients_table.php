<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('civility');
            $table->string('nom');
            $table->integer('age');
            $table->string('prenom');
            $table->string('email');
            $table->string('telephone');
            $table->text('adresse');
            $table->string('city');
            $table->string('country');
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
        Schema::dropIfExists('clients');
    }
}
