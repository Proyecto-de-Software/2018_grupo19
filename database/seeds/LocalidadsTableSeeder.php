<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalidadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('localidads')->insert([
            'nombre'=>'Bahia Blanca',
            'partido_id'=>'1'
        ]);
        DB::table('localidads')->insert([
            'nombre'=>'Nueve de julio',
            'partido_id'=>'2'
        ]);
        DB::table('localidads')->insert([
            'nombre'=>'Junin',
            'partido_id'=>'3'
        ]);
        DB::table('localidads')->insert([
            'nombre'=>'Pergamino',
            'partido_id'=>'4'
        ]);
        DB::table('localidads')->insert([
            'nombre'=>'General San Martin',
            'partido_id'=>'5'
        ]);
        DB::table('localidads')->insert([
            'nombre'=>'Lomas de Zamora',
            'partido_id'=>'6'
        ]);
        DB::table('localidads')->insert([
            'nombre'=>'General Rodriguez',
            'partido_id'=>'7'
        ]);
        DB::table('localidads')->insert([
            'nombre'=>'Mar del Plata',
            'partido_id'=>'8'
        ]);
        DB::table('localidads')->insert([
            'nombre'=>'Azul',
            'partido_id'=>'9'
        ]);
        DB::table('localidads')->insert([
            'nombre'=>'Lobos',
            'partido_id'=>'10'
        ]);
        DB::table('localidads')->insert([
            'nombre'=>'Ensenada',
            'partido_id'=>'11'
        ]);
        DB::table('localidads')->insert([
            'nombre'=>'La Matanza',
            'partido_id'=>'12'
        ]);
    }
}
