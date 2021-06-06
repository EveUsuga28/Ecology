<?php

namespace Database\Seeders;

use App\Models\institucions;
use Illuminate\Database\Seeder;

class instituciones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      $institucion = new institucions();

      $institucion->nombre = 'institucion educativa 1';
      $institucion->telefono = '1234567';
      $institucion->fechaRegistro = '2020-12-24 09:34:00';
      $institucion->foto = 'vacio XD';
      $institucion->direccion = 'calle random';

      $institucion->save();

    }
}
