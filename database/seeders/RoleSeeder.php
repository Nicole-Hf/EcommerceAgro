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

        //Dashboard
        Permission::create(['name' => 'home'])->syncRoles([$role1,$role2,$role3]);

        //Roles
        Permission::create(['name' => 'roles.index'])->assignRole($role1);
        Permission::create(['name' => 'roles.create'])->assignRole($role1);
        Permission::create(['name' => 'roles.edit'])->assignRole($role1);
        Permission::create(['name' => 'roles.show'])->assignRole($role1);
        Permission::create(['name' => 'roles.update'])->assignRole($role1);
        Permission::create(['name' => 'roles.store'])->assignRole($role1);
        Permission::create(['name' => 'roles.destroy'])->assignRole($role1);

        //Users
        Permission::create(['name' => 'users.index'])->assignRole($role1);

        //Clientes
        Permission::create(['name' => 'clientes.index'])->assignRole($role1);
        Permission::create(['name' => 'clientes.create'])->assignRole($role1,$role2);
        Permission::create(['name' => 'clientes.edit'])->assignRole($role1,$role2);
        Permission::create(['name' => 'clientes.show'])->assignRole($role1,$role2);
        Permission::create(['name' => 'clientes.store'])->assignRole($role1,$role2);
        Permission::create(['name' => 'clientes.update'])->assignRole($role1,$role2);
        Permission::create(['name' => 'clientes.destroy'])->assignRole($role1);

        //Empresas
        Permission::create(['name' => 'empresas.index'])->assignRole($role1);
        Permission::create(['name' => 'empresas.create'])->assignRole($role1,$role3);
        Permission::create(['name' => 'empresas.edit'])->assignRole($role1,$role3);
        Permission::create(['name' => 'empresas.show'])->assignRole($role1,$role3);
        Permission::create(['name' => 'empresas.store'])->assignRole($role1,$role3);
        Permission::create(['name' => 'empresas.update'])->assignRole($role1,$role3);
        Permission::create(['name' => 'empresas.destroy'])->assignRole($role1);

        //Categorias
        Permission::create(['name' => 'categorias.index'])->assignRole($role1);
        Permission::create(['name' => 'categorias.create'])->assignRole($role1);
        Permission::create(['name' => 'categorias.edit'])->assignRole($role1);
        Permission::create(['name' => 'categorias.show'])->assignRole($role1);
        Permission::create(['name' => 'categorias.store'])->assignRole($role1);
        Permission::create(['name' => 'categorias.update'])->assignRole($role1);
        Permission::create(['name' => 'categorias.destroy'])->assignRole($role1);

        //Subcategorias
        Permission::create(['name' => 'subcategorias.index'])->assignRole($role1);
        Permission::create(['name' => 'subcategorias.create'])->assignRole($role1);
        Permission::create(['name' => 'subcategorias.edit'])->assignRole($role1);
        Permission::create(['name' => 'subcategorias.show'])->assignRole($role1);
        Permission::create(['name' => 'subcategorias.store'])->assignRole($role1);
        Permission::create(['name' => 'subcategorias.update'])->assignRole($role1);
        Permission::create(['name' => 'subcategorias.destroy'])->assignRole($role1);

        //Productos
        Permission::create(['name' => 'productos.index'])->assignRole($role1);
        Permission::create(['name' => 'productos.create'])->assignRole($role1);
        Permission::create(['name' => 'productos.edit'])->assignRole($role1);
        Permission::create(['name' => 'productos.show'])->assignRole($role1);
        Permission::create(['name' => 'productos.store'])->assignRole($role1);
        Permission::create(['name' => 'productos.update'])->assignRole($role1);
        Permission::create(['name' => 'productos.destroy'])->assignRole($role1);

        Permission::create(['name' => 'Gestionar Bitácora'])->assignRole($role1);
        Permission::create(['name' => 'Gestionar Envío'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Forma de Pago'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Catalogo de Productos'])->syncRoles([$role1,$role2,$role3]);
    }
}
