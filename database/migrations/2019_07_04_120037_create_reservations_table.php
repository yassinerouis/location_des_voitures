<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
  
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->integer('car_id');
            //en attente , ...
            $table->string('status');
            //en ligne ...
            $table->string('type');
           
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('lieu_debut');
            $table->string('lieu_fin');
            $table->string('numero_vol');
            $table->string('numero_aeroport');
            $table->float('prix_total');
            $table->integer('id_device');
            $table->string('methode_payement');
            $table->string('has_paid');
            $table->string('message');
            $table->string('ip_adresse');
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
        Schema::dropIfExists('reservations');
    }
}
