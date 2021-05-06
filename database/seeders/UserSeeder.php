<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $usuario = User::create([
                'name' => 'administrador',
                'tipo_doc' => 'CC',
                'nro_documento' => '123456',
                'email' => 'admin@example.com',
                'Estado' => 'habilitado',
                'password' => bcrypt('admin1234')
        ])->assignRole('admin');

        $usuario = User::create([
            'name' => 'Director',
            'tipo_doc' => 'CC',
            'nro_documento' => '6543121',
            'email' => 'director@example.com',
            'Estado' => 'habilitado',
            'password' => bcrypt('dic1234')
        ])->assignRole('Director');

    }
}
