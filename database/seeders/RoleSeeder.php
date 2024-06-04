<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // Crear roles
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Discapacitado']);
        $role3 = Role::create(['name' => 'Especialista']); //crear, modificar o editar 



        Permission::create(['name' => 'usuarios.index', 'description' => 'VisualizarUsuarios'])->syncRoles([$role2]);
        Permission::create(['name' => 'usuarios.crear', 'description' => 'CrearUsuarios'])->syncRoles([$role2]);
        Permission::create(['name' => 'usuarios.editar', 'description' => 'EditarUsuarios'])->syncRoles([$role2]);
        Permission::create(['name' => 'roles.index', 'description' => 'VisualizarRoles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.crear', 'description' => 'CrearRoles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.editar', 'description' => 'EditarRoles'])->syncRoles([$role1]);
        Permission::create(['name' => 'VisualizarOpcionMenu', 'description' => 'Visualizar Opción del Menú'])->syncRoles([$role2, $role3]);

    }
}