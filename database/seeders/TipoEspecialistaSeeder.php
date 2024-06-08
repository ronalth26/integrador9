<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoEspecialistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tiposEspecialistas = [
            ['nombre' => 'Fisioterapeuta'],
            ['nombre' => 'Psicólogo'],
            ['nombre' => 'Psiquiatra'],
            ['nombre' => 'Terapeuta Ocupacional'],
            ['nombre' => 'Logopeda'],
            ['nombre' => 'Especialista en Audiología'],
            ['nombre' => 'Médico General'],
            ['nombre' => 'Neurólogo'],
            ['nombre' => 'Oftalmólogo'],
            // Agrega más tipos de especialistas según sea necesario
        ];

        DB::table('tipo_especialista')->insert($tiposEspecialistas);
    }
}
