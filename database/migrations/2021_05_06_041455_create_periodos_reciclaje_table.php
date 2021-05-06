<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodosReciclajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodos_reciclaje', function (Blueprint $table) {
            $table->id();
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->string('estado');
            $table->unsignedBigInteger('id_institucion');

            $table->foreign("id_institucion")
                ->references("id")
                ->on("institucions");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodos_reciclaje');
    }
}
