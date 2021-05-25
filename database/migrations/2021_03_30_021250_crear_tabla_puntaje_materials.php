<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPuntajeMaterials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntajeMaterials', function (Blueprint $table) {
            $table->bigIncrements('idPuntajeMaterail');
            $table->unsignedSmallInteger('id_materials');
            $table->datetime('Fecha_Inicio');
            $table->datetime('Fecha_Fin')->nullable();
            $table->integer('Puntaje');
            $table->string('Estado')-> default('habilitado');



            $table->foreign("id_materials")
            ->references("id")
            ->on("materials")
            ->onDelete("cascade")
            ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puntajeMaterials');
    }
}
