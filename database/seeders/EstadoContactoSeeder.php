<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_contacto')->insert([
            ['nombre' => 'pendiente', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'aceptado', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'rechazado', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

