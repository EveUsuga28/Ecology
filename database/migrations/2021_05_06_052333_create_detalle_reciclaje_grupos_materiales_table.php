<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleReciclajeGruposMaterialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_reciclaje_grupos_materiales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_reciclaje_grupo');
            $table->unsignedBigInteger('id_materiales');
            $table->integer('kilos');
            $table->integer('puntaje');

            $table->foreign("id_reciclaje_grupo")
                ->references("id")
                ->on("reciclaje_grupos");

            $table->foreign("id_materiales")
                ->references("id")
                ->on("materials");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_reciclaje_grupos_materiales');
    }
}
