<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un usuario administrador
        $admin = User::create([
            'name' => 'Admin',
            'email' => '333@gmail.com',
            'password' => bcrypt('11111111'), // Reemplaza 'contraseña' con la contraseña real
        ]);

        // Asignar el rol de administrador al usuario
        $adminRole = Role::where('name', 'admin')->first();
        $admin->assignRole($adminRole);
    }
}
