<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generos')->insert([
            'nombre'=>'Masculino'
        ]);
        DB::table('generos')->insert([
            'nombre'=>'Femenino'
        ]);
        DB::table('generos')->insert([
            'nombre'=>'Otro'
        ]);
    }
}
