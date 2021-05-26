<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuntajeProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntaje_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idproducto');
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->integer('puntaje');
            $table->string('estado')->default('habilitado');

            $table->foreign("idproducto")
                ->references("id")
                ->on("products");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puntaje_products');
    }
}
