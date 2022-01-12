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
        Permission::create(['name' => 'home',
            'description' => 'Dashboard'])->syncRoles([$role1,$role3]);

        //Roles
        Permission::create(['name' => 'roles.index',
            'description' => 'Listado de Roles'])->assignRole($role1);
        Permission::create(['name' => 'roles.create',
            'description' => 'Crear Rol'])->assignRole($role1);
        Permission::create(['name' => 'roles.edit',
            'description' => 'Editar Rol'])->assignRole($role1);
        Permission::create(['name' => 'roles.update',
            'description' => 'Actualizar Rol'])->assignRole($role1);
        Permission::create(['name' => 'roles.store',
            'description' => 'Guardar Rol'])->assignRole($role1);
        Permission::create(['name' => 'roles.destroy',
            'description' => 'Eliminar Rol'])->assignRole($role1);

        //Users
        Permission::create(['name' => 'users.index',
            'description' => 'Listado de Usuarios'])->assignRole($role1);
        Permission::create(['name' => 'users.edit',
            'description' => 'Editar Perfil de Usuario'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'users.delete',
            'description' => 'Eliminar Usuario'])->syncRoles($role1);

        //Clientes
        Permission::create(['name' => 'clientes.index',
            'description' => 'Listado de Clientes'])->assignRole($role1);
        Permission::create(['name' => 'clientes.create',
            'description' => 'Crear Cliente'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'clientes.edit',
            'description' => 'Editar Cliente'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'clientes.show',
            'description' => 'Mostrar Cliente'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'clientes.store',
            'description' => 'Guardar Cliente'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'clientes.update',
            'description' => 'Actualizar Cliente'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'clientes.destroy',
            'description' => 'Eliminar Cliente'])->assignRole($role1);

        //Empresas
        Permission::create(['name' => 'empresas.index',
            'description' => 'Listado de Empresas'])->assignRole($role1);
        Permission::create(['name' => 'empresas.create',
            'description' => 'Crear Empresa'])->assignRole($role3);
        Permission::create(['name' => 'empresas.store',
            'description' => 'Guardar Empresa'])->assignRole($role3);
        Permission::create(['name' => 'empresas.destroy',
            'description' => 'Eliminar Empresa'])->assignRole($role1);

        //Categorias
        Permission::create(['name' => 'categorias.index',
            'description' => 'Listado de Categorías'])->assignRole($role1);
        Permission::create(['name' => 'categorias.create',
            'description' => 'Crear Categoría'])->assignRole($role1);
        Permission::create(['name' => 'categorias.edit',
            'description' => 'Editar Categoría'])->assignRole($role1);
        Permission::create(['name' => 'categorias.store',
            'description' => 'Guardar Categoría'])->assignRole($role1);
        Permission::create(['name' => 'categorias.update',
            'description' => 'Actualizar Categoría'])->assignRole($role1);
        Permission::create(['name' => 'categorias.destroy',
            'description' => 'Eliminar Categoría'])->assignRole($role1);

        //Subcategorias
        Permission::create(['name' => 'subcategorias.index',
            'description' => 'Listado de Subcategorías'])->assignRole($role1);
        Permission::create(['name' => 'subcategorias.create',
            'description' => 'Crear Subcategoría'])->assignRole($role1);
        Permission::create(['name' => 'subcategorias.edit',
            'description' => 'Editar Subcategoría'])->assignRole($role1);
        Permission::create(['name' => 'subcategorias.store',
            'description' => 'Guardar Subcategoría'])->assignRole($role1);
        Permission::create(['name' => 'subcategorias.update',
            'description' => 'Actualizar Subcategoría'])->assignRole($role1);
        Permission::create(['name' => 'subcategorias.destroy',
            'description' => 'Eliminar Subcategoría'])->assignRole($role1);

        //Productos
        Permission::create(['name' => 'productos.index',
            'description' => 'Listado de Producto'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'productos.create',
            'description' => 'Crear Producto'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'productos.edit',
            'description' => 'Editar Producto'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'productos.show',
            'description' => 'Mostrar Producto'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'productos.store',
            'description' => 'Guardar Producto'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'productos.update',
            'description' => 'Actualizar Producto'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'productos.destroy',
            'description' => 'Eliminar Producto'])->syncRoles([$role1,$role3]);

        //CARRITO
        Permission::create(['name' => 'carrito.add',
            'description' => 'Añadir productos al carrito'])->assignRole($role2);
        Permission::create(['name' => 'carrito.estado',
            'description' => 'Ver el estado del carrito'])->assignRole($role2);
        Permission::create(['name' => 'carrito.eliminar',
            'description' => 'Eliminar productos del carrito'])->assignRole($role2);
        Permission::create(['name' => 'carrito.updateItem',
            'description' => 'Actualizar cantidad del carrito'])->assignRole($role2);

        //CATALOGO
        Permission::create(['name' => 'catalogo',
            'description' => 'Ver el catálogo de productos'])->assignRole($role2);

        //OTROS
        Permission::create(['name' => 'bitacora.index',
            'description' => 'Listado de Bitácoras'])->assignRole($role1);

        Permission::create(['name' => 'pedidos.index',
            'description' => 'Listado de Pedidos'])->syncRoles($role2);

        Permission::create(['name' => 'pagos.index',
            'description' => 'Listado de Pagos'])->syncRoles($role2);

        Permission::create(['name' => 'reportes.index',
            'description' => 'Reportes de Ventas'])->syncRoles([$role3]);
    }
}
