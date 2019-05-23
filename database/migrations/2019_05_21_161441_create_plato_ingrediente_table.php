<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatoIngredienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plato_ingrediente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('codplato')->unsigned();
            $table->bigInteger('codingrediente')->unsigned();
            $table->double('cantidad');
            $table->timestamps();
        });
      
        Schema::table('plato_ingrediente', function (Blueprint $table) {
          $table->foreign('codplato')->references('codigo')->on('plato')->onDelete('cascade');
          $table->foreign('codingrediente')->references('codigo')->on('ingrediente')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plato_ingrediente');
    }
}
