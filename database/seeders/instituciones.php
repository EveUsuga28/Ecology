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

      $institucion2 = new institucions();

      $institucion2->nombre = 'institucion educativa 2';
      $institucion2->telefono = '1234567';
      $institucion2->fechaRegistro = '2020-12-24 09:34:00';
      $institucion2->foto = 'vacio XD';
      $institucion2->direccion = 'calle random';

      $institucion2->save();

      $institucion3 = new institucions();

      $institucion3->nombre = 'institucion educativa 3';
      $institucion3->telefono = '1234567';
      $institucion3->fechaRegistro = '2020-12-24 09:34:00';
      $institucion3->foto = 'vacio XD';
      $institucion3->direccion = 'calle random';

      $institucion3->save();

    }
}
