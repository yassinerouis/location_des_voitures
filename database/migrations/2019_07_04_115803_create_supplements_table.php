<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
  
        Schema::create('supplements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('image_alt');
            $table->string('slug');
            $table->string('name');
            $table->string('title');
            $table->text('descrition');
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
        Schema::dropIfExists('suppelemnts');
    }
}
