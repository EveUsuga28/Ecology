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

        Permission::create(['name'=>''])->syncRoles([$role1]);

    }
}
