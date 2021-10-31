<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Cliente']);
        $role3 = Role::create(['name' => 'Empresa']);

        Permission::create(['name' => 'Ver Dashboard'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Gestionar Categorías'])->assignRole($role1);
        Permission::create(['name' => 'Gestionar Empresa'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'Gestionar Cliente'])->assignRole($role1);
        Permission::create(['name' => 'Gestionar Subcategorías'])->assignRole($role1);
        Permission::create(['name' => 'Gestionar Bitácora'])->assignRole($role1);
        Permission::create(['name' => 'Gestionar Productos'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'Editar Perfil'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Gestionar Envío'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Forma de Pago'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Catalogo de Productos'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Gestionar Roles'])->assignRole($role1);
        Permission::create(['name' => 'Gestionar Permisos'])->assignRole($role1);
    }
}
