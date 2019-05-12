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
            'nombre'=>'La Plata',
            'region_sanitaria_id'=>1
        ]);
        DB::table('partidos')->insert([
            'nombre'=>'Chivilcoy',
            'region_sanitaria_id'=>2
        ]);
        DB::table('partidos')->insert([
            'nombre'=>'GBA',
            'region_sanitaria_id'=>3
        ]);
        DB::table('partidos')->insert([
            'nombre'=>'CABA',
            'region_sanitaria_id'=>4
        ]);
    }
}
