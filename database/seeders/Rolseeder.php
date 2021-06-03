<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Rolseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'admin']);
        $role2 = Role::create(['name'=>'Director']);

        Permission::create(['name'=>'usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=>'material/create'])->syncRoles([$role1]);
        Permission::create(['name'=>'material/edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'crearNuevoPuntaje'])->syncRoles([$role1]);
        Permission::create(['name'=>'puntajeMaterial/create'])->syncRoles([$role1]);
        Permission::create(['name'=>'puntajeMaterial'])->syncRoles([$role1]);


        Permission::create(['name'=>'editar'])->syncRoles([$role1]);

        Permission::create(['name'=>'crear'])->syncRoles([$role1]);

        Permission::create(['name'=>'confirmarRechazar'])->syncRoles([$role1]);

        Permission::create(['name'=>'producto/create'])->syncRoles([$role1]);
        Permission::create(['name'=>'producto/edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'producto/index'])->syncRoles([$role1]);
        Permission::create(['name'=>'producto.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'producto.edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'estado/crearpuntaje'])->syncRoles([$role1]);
        Permission::create(['name'=>'puntajeproductobtn'])->syncRoles([$role1]);

        //Permission::create(['name'=>'institucion/director'])->syncRoles

    }
}
