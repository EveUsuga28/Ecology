<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReciclajeGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reciclaje_grupos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_periodo_reciclaje');
            $table->unsignedBigInteger('id_grupo');
            $table->integer('total_kilos_material_grupo');
            $table->integer('total_puntaje_material_grupo');
            $table->integer('total_cantidad_productos_grupo');
            $table->integer('total_puntaje_productos_grupo');
            $table->integer('total_puntaje_grupo');
            $table->date('fecha');

            $table->foreign("id_periodo_reciclaje")
                ->references("id")
                ->on("periodos_reciclaje");

            $table->foreign("id_grupo")
                ->references("id")
                ->on("grupos");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reciclaje_grupos');
    }
}
