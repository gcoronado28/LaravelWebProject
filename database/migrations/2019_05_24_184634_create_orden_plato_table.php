<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenPlatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_plato', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('numorden')->unsigned();
            $table->bigInteger('codplato')->unsigned();
            $table->double('cantidad');
            $table->double('valor');
            $table->timestamps();
        });
      
        Schema::table('orden_plato', function (Blueprint $table) {
          $table->foreign('numorden')->references('numero')->on('orden')->onDelete('cascade'); 
          $table->foreign('codplato')->references('codigo')->on('plato')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_plato');
    }
}
