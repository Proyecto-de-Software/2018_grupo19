<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TratamientoFarmacologicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tratamiento_farmacologicos')->insert([
            'nombre'=>'Mañana'
        ]);
        DB::table('tratamiento_farmacologicos')->insert([
            'nombre'=>'Tarde'
        ]);
        DB::table('tratamiento_farmacologicos')->insert([
            'nombre'=>'Noche'
        ]);
    }
}
