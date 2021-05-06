<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleReciclajeGruposProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_reciclaje_grupos_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_reciclaje_grupo');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->integer('puntaje');

            $table->foreign("id_reciclaje_grupo")
                ->references("id")
                ->on("reciclaje_grupos");

            $table->foreign("id_producto")
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
        Schema::dropIfExists('detalle_reciclaje_grupos_productos');
    }
}
