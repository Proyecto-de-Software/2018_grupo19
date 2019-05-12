<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotivoConsultasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('motivo_consultas')->insert([
            'nombre'=>'Receta Medica'
        ]);
        DB::table('motivo_consultas')->insert([
            'nombre'=>'Control por guardia'
        ]);
        DB::table('motivo_consultas')->insert([
            'nombre'=>'Consulta'
        ]);
        DB::table('motivo_consultas')->insert([
            'nombre'=>'Intento de suicidio'
        ]);
        DB::table('motivo_consultas')->insert([
            'nombre'=>'Interconsulta'
        ]);
        DB::table('motivo_consultas')->insert([
            'nombre'=>'Otras'
        ]);
    }
}
