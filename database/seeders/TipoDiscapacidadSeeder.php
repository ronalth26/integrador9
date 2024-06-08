<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDiscapacidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['nombre' => 'Daltonismo'],
            ['nombre' => 'Ceguera'],
            ['nombre' => 'Sordera'],
            ['nombre' => 'Discapacidad Motriz'],
            ['nombre' => 'Discapacidad Intelectual'],
            ['nombre' => 'Discapacidad Psicosocial'],
            ['nombre' => 'Autismo'],
            ['nombre' => 'Discapacidad Visual Parcial'],
            // Agrega más tipos según sea necesario
        ];

        DB::table('tipo_discapacidad')->insert($tipos);
    }
}
