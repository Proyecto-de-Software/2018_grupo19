<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partidos')->insert([
            'nombre'=>'Bahia Blanca',
            'region_sanitaria_id'=>'1'
        ]);
        DB::table('partidos')->insert([
            'nombre'=>'Nueve de julio',
            'region_sanitaria_id'=>'2'
        ]);
        DB::table('partidos')->insert([
            'nombre'=>'Junin',
            'region_sanitaria_id'=>'3'
        ]);
        DB::table('partidos')->insert([
            'nombre'=>'Pergamino',
            'region_sanitaria_id'=>'4'
        ]);
        DB::table('partidos')->insert([
            'nombre'=>'General San Martin',
            'region_sanitaria_id'=>'5'
        ]);
        DB::table('partidos')->insert([
            'nombre'=>'Lomas de Zamora',
            'region_sanitaria_id'=>'6'
        ]);
        DB::table('partidos')->insert([
            'nombre'=>'General Rodriguez',
            'region_sanitaria_id'=>'7'
        ]);
        DB::table('partidos')->insert([
            'nombre'=>'Mar del Plata',
            'region_sanitaria_id'=>'8'
        ]);
        DB::table('partidos')->insert([
            'nombre'=>'Azul',
            'region_sanitaria_id'=>'9'
        ]);
        DB::table('partidos')->insert([
            'nombre'=>'Lobos',
            'region_sanitaria_id'=>'10'
        ]);
        DB::table('partidos')->insert([
            'nombre'=>'Ensenada',
            'region_sanitaria_id'=>'11'
        ]);
        DB::table('partidos')->insert([
            'nombre'=>'La Matanza',
            'region_sanitaria_id'=>'12'
        ]);
    }
}
