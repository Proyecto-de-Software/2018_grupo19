<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoInstitucionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_institucions')->insert([
            'nombre'=>'Hospital'
        ]);
        DB::table('tipo_institucions')->insert([
            'nombre'=>'Comisaria'
        ]);
        DB::table('tipo_institucions')->insert([
            'nombre'=>'Otro'
        ]);
    }
}
